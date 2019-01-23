<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Horaires
 *
 * @ORM\Table(name="horaires")
 * @ORM\Entity
 */
class Horaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_horaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHoraire;

    /**
     * @var bool
     *
     * @ORM\Column(name="Matin", type="boolean", nullable=false)
     */
    private $matin;

    /**
     * @var bool
     *
     * @ORM\Column(name="Apresmidi", type="boolean", nullable=false)
     */
    private $apresmidi;

    /**
     * @var bool
     *
     * @ORM\Column(name="H24", type="boolean", nullable=false)
     */
    private $h24;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artisan", inversedBy="idHoraire")
     * @ORM\JoinTable(name="prend",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_horaire", referencedColumnName="Id_horaire")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     *   }
     * )
     */
    private $idArtisan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idArtisan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdHoraire(): ?int
    {
        return $this->idHoraire;
    }

    public function getMatin(): ?bool
    {
        return $this->matin;
    }

    public function setMatin(bool $matin): self
    {
        $this->matin = $matin;

        return $this;
    }

    public function getApresmidi(): ?bool
    {
        return $this->apresmidi;
    }

    public function setApresmidi(bool $apresmidi): self
    {
        $this->apresmidi = $apresmidi;

        return $this;
    }

    public function getH24(): ?bool
    {
        return $this->h24;
    }

    public function setH24(bool $h24): self
    {
        $this->h24 = $h24;

        return $this;
    }

    /**
     * @return Collection|Artisan[]
     */
    public function getIdArtisan(): Collection
    {
        return $this->idArtisan;
    }

    public function addIdArtisan(Artisan $idArtisan): self
    {
        if (!$this->idArtisan->contains($idArtisan)) {
            $this->idArtisan[] = $idArtisan;
        }

        return $this;
    }

    public function removeIdArtisan(Artisan $idArtisan): self
    {
        if ($this->idArtisan->contains($idArtisan)) {
            $this->idArtisan->removeElement($idArtisan);
        }

        return $this;
    }

}
