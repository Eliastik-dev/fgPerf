<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // On crée le message
            $message = (new \Swift_Message('Nouveau contact'))
                // On attribue l'expéditeur
                ->setFrom($contact['email'])
                // On attribue le destinataire
                ->setTo('votre@mail.com') // !!! ne pas oublier de changer dans .env
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        compact('contact')
                    ),
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('message', 'Votre message a bien été transmis.'); // Permet un message flash de renvoi
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', ['contactForm' => $form->createView()]);
    }
}
