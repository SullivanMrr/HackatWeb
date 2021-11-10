<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="participer", indexes={@ORM\Index(name="I_FK_PARTICIPER_PARTICIPANTS", columns={"ID"}), @ORM\Index(name="I_FK_PARTICIPER_INITIATION", columns={"ID_1"})})
 * @ORM\Entity
 */
class Participer
{
    /**
     * @var string
     *
     * @ORM\Column(name="ID", type="string", length=32, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ID_1", type="string", length=32, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id1;


}
