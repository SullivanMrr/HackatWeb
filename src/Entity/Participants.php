<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participants
 *
 * @ORM\Table(name="participants")
 * @ORM\Entity
 */
class Participants
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MAIL", type="string", length=50, nullable=true)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATENAISS", type="string", length=50, nullable=true)
     */
    private $datenaiss;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PORTFOLIO", type="string", length=50, nullable=true)
     */
    private $portfolio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOGIN", type="string", length=50, nullable=true)
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PASSWORD", type="string", length=50, nullable=true)
     */
    private $password;


}
