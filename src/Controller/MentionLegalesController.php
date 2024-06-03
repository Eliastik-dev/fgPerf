<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MentionLegalesController extends AbstractController
{
    /**
     * @Route("/mention/legales", name="mention_legales")
     */
    public function index()
    {
        return $this->render('mention_legales/index.html.twig', [
            'controller_name' => 'MentionLegalesController',
        ]);
    }
}
