<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Initiation
 *
 * @ORM\Table(name="initiation")
 * @ORM\Entity
 */
class Initiation
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
     * @ORM\Column(name="PARTICIPANTSLIMIT", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $participantslimit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HEURE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $heure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DUREE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $duree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $salle;


}
