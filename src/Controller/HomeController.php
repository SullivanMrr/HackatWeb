<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/Hackaton", name="ListeHack")
     */

     public function Afficherhack(){
         $repository =$this->getDoctrine()->getRepository(Hackathon::class);
         $lesHackatons = $repository->findAll();

         return $this->render('home/Hackaton.html.twig', ['lesHackatons' =>$lesHackatons]);
     }
      /**
     * @Route("/Hackaton/{id}", name="ListeUnHack")
     */
     public function AfficherUnhack($id){
        $repository =$this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackatons = $repository->find($id);

        return $this->render('home/UnHackaton.html.twig', ['Hackaton' =>$lesHackatons]);
    }


    /**
     * @Route("/Hackaton/ville/{ville}", name="UneVilleRechercher")
     */
 
    public function uneVilleChercher($ville): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackatons = $repository->findBy(array('ville' => $ville));
        return $this->render('home/HackatonVille.html.twig', ['lesHackatons' => $lesHackatons]);

    }

    

}
