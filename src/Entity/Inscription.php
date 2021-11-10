<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="I_FK_INSCRIPTION_HACKATON", columns={"ID_ASSISTER"}), @ORM\Index(name="I_FK_INSCRIPTION_PARTICIPANTS", columns={"ID"})})
 * @ORM\Entity
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="NUMUNIQUE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numunique;

    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ID_ASSISTER", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $idAssister;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATEINSCRIPTION", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $dateinscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRESENTATIONTEXTE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $presentationtexte;


}
