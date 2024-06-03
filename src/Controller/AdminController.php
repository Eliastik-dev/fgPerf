<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
    /**
     * @Route("/admin/dashboard", name= "adminDashboard")
     */
    public function dashboard()
    {

        $userCount = $this->getDoctrine()->getRepository(User::class)->count([]);
        $resaCount = $this->getDoctrine()->getRepository(Reservation::class)->count([]);

        return $this->render('admin/dashboard.html.twig', [
            'userCount' => $userCount,
            'resaCount' => $resaCount
        ]);
    }

}
