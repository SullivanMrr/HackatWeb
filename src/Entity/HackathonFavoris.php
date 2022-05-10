<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HackathonFavoris
 *
 * @ORM\Table(name="hackathon_favoris", indexes={@ORM\Index(name="I_FK_HACKATHON_FAVORIS_PARTICIPANT", columns={"ID_PARTICIPANT"}), @ORM\Index(name="I_FK_HACKATHON_FAVORIS_HACKATHON", columns={"ID_HACKATHON"})})
 * @ORM\Entity
 */
class HackathonFavoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PARTICIPANT", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idParticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_HACKATHON", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idHackathon;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMFAVORIS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numfavoris;

    public function getIdParticipant(): ?int
    {
        return $this->idParticipant;
    }

    public function setIdParticipant(int $idParticipant): self
    {
        $this->idParticipant = $idParticipant;

        return $this;
    }

    public function getIdHackathon(): ?int
    {
        return $this->idHackathon;
    }

    public function setIdHackathon(int $idHackathon): self
    {
        $this->idHackathon = $idHackathon;

        return $this;
    }

    public function getNumfavoris(): ?int
    {
        return $this->numfavoris;
    }

    public function setNumfavoris(int $numfavoris): self
    {
        $this->numfavoris = $numfavoris;

        return $this;
    }


}
