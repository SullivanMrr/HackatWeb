<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements", indexes={@ORM\Index(name="I_FK_EVENEMENTS_HACKATON", columns={"ID"})})
 * @ORM\Entity
 */
class Evenements
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
     * @ORM\Column(name="LIBELLE", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATE", type="string", length=50, nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HEURE", type="string", length=50, nullable=true)
     */
    private $heure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DUREE", type="string", length=50, nullable=true)
     */
    private $duree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALLE", type="string", length=50, nullable=true)
     */
    private $salle;


}
