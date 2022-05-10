<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Entity\Evenements;
use App\Entity\Hackathon;
use App\Entity\HackathonFavoris;
use App\Entity\Participant;
use App\Entity\Participer;
use App\Form\RegistrationFormType;
use App\Repository\HackathonFavorisRepository;
use App\Repository\HackathonRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\User;
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

    public function Afficherhack(HackathonRepository $hackathonRepository)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $FavorisRepository = $this->getDoctrine()->getRepository(HackathonFavoris::class);
        $lesHackathons = $repository->findAll();
        $lesVilles = $hackathonRepository->distinctVille();

        $favoris = $FavorisRepository->findBy(['idParticipant' => $this->getUser()]);
        return $this->render('home/Hackathon.html.twig', ['lesHackathons' => $lesHackathons, 'lesVilles' => $lesVilles, 'unFavoris' => $favoris]);
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
        return $this->render('home/HackathonVille.html.twig', ['lesHackathons' => $lesHackathons]);
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

            return $this->redirectToRoute('security_login');
        }

        return $this->render('authentification/inscription.html.twig', [
            'InscriptionForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/getHackathon", name="getHackathon", methods="GET")
     */
    public function getHackathon()
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/getLesAteliers", name="getLesAteliers", methods="GET")
     */
    public function getLesAteliers()
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Evenements::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }

    /**
     * @Route("/getAtelier/{idHackae}", name="getAtelier", methods="GET")
     */
    public function getAtelier($idHackae)
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Evenements::class);
        $products = $repository->findBy(['idHackathon' => $idHackae]);
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/getConference", name="getConference", methods="GET")
     */
    public function getConference()
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Conference::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }
    /**
     * @Route("/InscriptionHackathon/{id}", name="InscriptionHackathon")
     */
    public function InscripHackat($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
        $date = new \DateTime('now');
        $datelimite = $leHackathon->getdateLimite();

        $user = $this->getUser();

        if ($datelimite->format('Y-m-d') < $date->format('Y-m-d')) {

            $this->addFlash('error', "Date limite dépassée !");
            return $this->redirectToRoute('ListeHack');
        } elseif ($leHackathon->getnbPlaces() == 0) {

            $this->addFlash('error', "Il n'y a plus de place dans cet hackathon.");
            return $this->redirectToRoute('ListeHack');
        } elseif ($user == null) {
            $this->addFlash('error', "Veuillez vous connectez pour vous inscrire à un hackathon  !");
            return $this->redirectToRoute('ListeHack');
        } elseif ($this->getDoctrine()->getRepository(Participer::class)->findOneBy(array('idParticipant' => $user->getIdParticipant(), 'idHackathon' => $leHackathon->getIdHackathon())) !== null) {

            $this->addFlash('error', "Vous êtes déjà inscrit à cet Hackathon !");
            return $this->redirectToRoute('ListeHack');
        } elseif (empty($_POST['description'])) {

            $this->addFlash('error', "Vous devez remplir le champ description");
            return $this->redirectToRoute('ListeHack');
        } else {

            $entityManager = $this->getDoctrine()->getManager();

            $participer = new Participer();

            $participer->setIdParticipant($user->getId());
            $participer->setIdHackathon($leHackathon->getIdHackathon());
            $participer->setDateinscription(new DateTime('now'));
            $participer->setDescription($_POST['description']);


            // $participer->setNuminscri($numInscri);

            $leHackathon->setNbPlaces($leHackathon->getNbPlaces() - 1);

            $entityManager->persist($participer);
            $entityManager->flush();


            $this->addFlash('success', "Vous vous êtes inscrit à cet Hackathon avec succès");
            return $this->redirectToRoute('ListeHack');
        }





        return $this->render('home/InscriptionHackathon.html.twig', ['Hackathon' => $leHackathon]);
    }


    /**
     * @Route("/listeHackathon/{id}/favoris", name="hackathonFavoris")
     */

    public function favoris($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(HackathonFavoris::class);
        $leFavori = $repository->findOneBy(['idHackathon' => $id, 'idParticipant' => $this->getUser()->getUserIdentifier()]);
        if ($leFavori == null) {
            $favoris = new HackathonFavoris;
            $favoris->setIdHackathon($id);
            $favoris->setIdParticipant($this->getUser()->getUserIdentifier());
            $em = $this->getDoctrine()->getManager();
            $em->persist($favoris);
        } else {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leFavori);
        }
        $em->flush();
        return $this->redirectToRoute('ListeHack');
    }
}
