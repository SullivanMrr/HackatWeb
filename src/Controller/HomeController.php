<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Entity\Evenements;
use App\Entity\Hackathon;
use App\Entity\Initiation;
use App\Entity\Participant;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
     * @Route("/Hackathon", name="ListeHack")
     */

    public function Afficherhack()
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackathons = $repository->findAll();
        return $this->render('home/Hackathon.html.twig', ['lesHackathons' => $lesHackathons, 'lesVilles' => $lesHackathons]);
    }
    /**
     * @Route("/Hackathon/{id}", name="ListeUnHack")
     */
    public function AfficherUnhack($id)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);

        return $this->render('home/UnHackathon.html.twig', ['Hackathon' => $leHackathon]);
    }


    /**
     * @Route("/Hackathon/ville/{ville}", name="UneVilleRechercher")
     */

    public function uneVilleChercher($ville): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackathons = $repository->findBy(array('ville' => $ville));
        return $this->render('home/HackathonVilleTes.html.twig', ['lesHackathons' => $lesHackathons]);
    }
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(): Response
    {
        return $this->render('authentification/connexion.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $participant = new Participant();
        $form = $this->createForm(RegistrationFormType::class, $participant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $participant->setPassword(
                $passwordEncoder->hashPassword(
                    $participant,
                    $form->get('Password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participant);
            $entityManager->flush();

            
        }

        return $this->render('authentification/inscription.html.twig', [
            'InscriptionForm' => $form->createView(),
        ]);
    }

 /**
     * @Route("/getHackathon", name="getHackathon", methods="GET")
     */
    public function getHackathon(){
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/getAtelier/{idHackae}", name="getAtelier", methods="GET")
     */
    public function getAtelier($idHackae){
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Evenements::class);
        $products = $repository->findBy(['idHackae'=>$idHackae ]);
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/getConference", name="getConference", methods="GET")
     */
    public function getConference(){
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Conference::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/InscriptionHackathon", name="InscriptionHackathon")
     */
    public function InscripHackat(): Response
   
    {
        return $this->render('home/InscriptionHackathon.html.twig',[ 'controller_name' => 'HomeController', ]);
    }
}
