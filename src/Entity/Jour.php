<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Jour
 *
 * @ORM\Table(name="jour")
 * @ORM\Entity(repositoryClass="App\Repository\JourRepository")
 */
class Jour
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
     * @var string
     *
     * @ORM\Column(name="Nom_jour", type="string", length=20, nullable=false)
     */
    private $nomJour;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_type_horaire", type="string", length=20, nullable=false)
     */
    private $nomTypeHoraire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artisan", mappedBy="idHoraire")
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

    public function getNomJour(): ?string
    {
        return $this->nomJour;
    }

    public function setNomJour(string $nomJour): self
    {
        $this->nomJour = $nomJour;

        return $this;
    }

    public function getNomTypeHoraire(): ?string
    {
        return $this->nomTypeHoraire;
    }

    public function setNomTypeHoraire(string $nomTypeHoraire): self
    {
        $this->nomTypeHoraire = $nomTypeHoraire;

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
            $idArtisan->addIdHoraire($this);
        }

        return $this;
    }

    public function removeIdArtisan(Artisan $idArtisan): self
    {
        if ($this->idArtisan->contains($idArtisan)) {
            $this->idArtisan->removeElement($idArtisan);
            $idArtisan->removeIdHoraire($this);
        }

        return $this;
    }

}
