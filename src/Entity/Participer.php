<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="participer", indexes={@ORM\Index(name="I_FK_PARTICIPER_PARTICIPANT", columns={"ID_PARTICIPANT"}), @ORM\Index(name="I_FK_PARTICIPER_HACKATHON", columns={"ID_HACKATHON"})})
 * @ORM\Entity
 */
class Participer
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_HACKATHON", type="integer", nullable=false)
     */
    private $idHackathon;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_PARTICIPANT", type="integer", nullable=false)
     */
    private $idParticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMINSCRIPTION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numinscription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEINSCRIPTION", type="date", nullable=true)
     */
    private $dateinscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=255, nullable=true, options={"fixed"=true})
     */
    private $description;

    public function getIdHackathon(): ?int
    {
        return $this->idHackathon;
    }

    public function setIdHackathon(int $idHackathon): self
    {
        $this->idHackathon = $idHackathon;

        return $this;
    }

    public function getIdParticipant(): ?int
    {
        return $this->idParticipant;
    }

    public function setIdParticipant(int $idParticipant): self
    {
        $this->idParticipant = $idParticipant;

        return $this;
    }

    public function getNuminscription(): ?int
    {
        return $this->numinscription;
    }

    public function getDateinscription(): ?\DateTimeInterface
    {
        return $this->dateinscription;
    }

    public function setDateinscription(?\DateTimeInterface $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
