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


}
