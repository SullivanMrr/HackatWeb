<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Repository\HackathonFavorisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Repository\HackatonRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
        /**
         * @Route("/login", name="security_login")
         */
        public function login(AuthenticationUtils $authenticationUtils): Response
        {
                $errors = $authenticationUtils->getLastAuthenticationError();
                $lastUsername = $authenticationUtils->getLastUsername();
                return $this->render('security/login.html.twig', [
                        'last_username' => $lastUsername,
                        'error'         => $errors,
                ]);
        }

        /**
         * @Route("/logout", name="security_logout")
         */
        public function logout()
        {
                throw new \Exception('Will be intercepted before getting here');
        }

        /**
         * @Route("/profil", name="profil")
         */
        public function profil(HackatonRepository $hackatonRepository)
        {
                $id = $this->getUser()->getId();
                $lesHackathons = $hackatonRepository->getParticiperHackathon($id);
                $lesFavoris = $hackatonRepository->getFavoris($id);
                return $this->render('security/profil.html.twig', ['lesHackathons' => $lesHackathons, 'lesFavoris' => $lesFavoris]);
        }
}
