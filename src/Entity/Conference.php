<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity
 */
class Conference
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
     * @ORM\Column(name="THEME", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $theme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="INTERVENANT", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $intervenant;

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
