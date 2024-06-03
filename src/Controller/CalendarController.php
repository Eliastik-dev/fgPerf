<?php

namespace App\Controller;

use App\Entity\Jour;
use App\Entity\Horaire;
use App\Entity\Categorie;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalendarController extends AbstractController
{
    /**
     * @Route("/calendar", name="calendar")
     */
    public function index()
    {
        // Récupération des données des catégories
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $datas = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository(Jour::class);
        $jours = $repository->findBy(array(), array('date' => 'ASC'));        
        // Renvoi de la page
        return $this->render('calendar/index.html.twig', ["datas"=>$datas, "jours"=>$jours]);
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation(Request $request){
        //préparation des données
        $categorieId = $request->request->get('categorie-id');
        $jourId = $request->request->get('jour-id');
        $horaireId = $request->request->get('horaire-id');
        $prenom = $request->request->get('prenom');
        $tel = $request->request->get('phone');
        //
        //
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $categorie = $repository->find($categorieId);
        $repository = $this->getDoctrine()->getRepository(Jour::class);
        $jour = $repository->find($jourId);
        $repository = $this->getDoctrine()->getRepository(Horaire::class);
        $horaire = $repository->find($horaireId);
        
        //on instancie une inscription
        $reservation = new Reservation();
        $reservation->setCategorie($categorie);
        $reservation->setJour($jour);
        $reservation->setHoraire($horaire);
        $reservation->setPrenom($prenom);
        $reservation->setTelephone($tel);
        //Mise en BDD
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reservation);
        $entityManager->flush();
        return new Response("Inscription validée pour catégorie = " . $categorie);
    }
}
