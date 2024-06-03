<?php

namespace App\Controller;

use App\Form\ProgrammePersoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProgrammeController extends AbstractController
{
    /**
     * @Route("/programme", name="programme")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ProgrammePersoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prog = $form->getData();

            return $this->redirectToRoute('home');
        }
        
        return $this->render('programme/index.html.twig', [
            'progPerso' => $form->createView()
        ]);
    }
}
