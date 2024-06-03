<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
     * @Route("/profil/edit", name="profil_edit")
     */
    public function editProfile(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfileType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('profil');
        }
        
        return $this->render('profil/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil/editPass", name="profil_editPass")
     */
    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder) // cryptage du MDP
    {
        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();


            //Vérification si les 2 MDP sont identiques
            if($request->request->get('pass') == $request->request->get('pass2')){
                $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('pass')));
                $em->flush();
                $this->addFlash('message', 'Mot de passe mis à jour avec succès');

                return $this->redirectToRoute('profil');
                
            } else {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas');
            }
        }
        
        return $this->render('profil/editPass.html.twig');
    }
}
