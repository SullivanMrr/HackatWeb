<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PdoHackatWeb;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Participant;

class ApiController extends AbstractController
{

    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Route("/api/hackathon", name="api", methods="GET")
     */
    public function getHackathon(PdoHackatWeb $monPdo): JsonResponse
    {
        $hackathons = $monPdo->getLesHackathons();
        $tabJSON = [];
        foreach ($hackathons as $unHackathon) {
            $tabJSON[] = [
                'id' => $unHackathon->getId(),
                'theme' => $unHackathon->getTheme(),
                'datedebut' => $unHackathon->getDatedebut(),
                'datefin' => $unHackathon->getDatefin(),
                'heuredebut' => $unHackathon->getHeuredebut(),
                'heurefin' => $unHackathon->getHeurefin(),
                'lieu' => $unHackathon->getLieu(),
                'rue' => $unHackathon->getRue(),
                'ville' => $unHackathon->getVille(),
                'codepostal' => $unHackathon->getCodepostal(),
                'datelimite' => $unHackathon->getDatelimite(),
                'nbplaces' => $unHackathon->getNbplaces()

            ];
        }
        dump($tabJSON);
        $var = new JsonResponse($tabJSON);
        dump($var);
        return $var;
    }

    /**
     * @Route("/setInscription", name="api_inscription", methods="POST")
     */

    public function newUser(Request $request, PdoHackatWeb $monPdo)
    {

        $content = $request->getContent();
        
        if (!empty($content)) {

            $tabDonnees = json_decode($request->getContent());
            
            $user = [
                'nom' =>$tabDonnees->nom,
                'prenom' =>$tabDonnees->prenom,
                'mail' => $tabDonnees->mail,
                'dateNaiss' => $tabDonnees->dateNaiss,
                'numTel' => $tabDonnees->numTel,
                'Portfolio' => $tabDonnees->Portfolio,
                'password' =>$tabDonnees->Password
            ];
           // $user = new Participant($tabDonnees);

            $monPdo->setUser($user);
        }

        return new JsonResponse($tabDonnees, Response::HTTP_CREATED);
    }

    /**
     * @Route("/getLesAteliersHacka", name="getLesAteliersHacka", methods="GET")
     */
    public function getLesAteliersHacka(PdoHackatWeb $monPdo): JsonResponse
    {
        $ateliers = $monPdo->getLesHackathons();
        $tabJSON = [];
        foreach ($ateliers as $unAtelier) {
            $tabJSON[] = [
                'ParticipantsLimite' => $unAtelier->getParticipantslimite(),
                'Libelle' => $unAtelier->getLibelle(),
                'DateEven' => $unAtelier->getDateeven(),
                'Heure' => $unAtelier->getHeure(),
                'Duree' => $unAtelier->getDuree(),
                'Salle' => $unAtelier->getSalle(),
            ];
        }
        dump($tabJSON);
        $var = new JsonResponse($tabJSON);
        dump($var);
        return $var;
    }
    
}
