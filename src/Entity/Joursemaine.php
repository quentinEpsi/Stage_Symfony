<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Joursemaine
 *
 * @ORM\Table(name="joursemaine")
 * @ORM\Entity
 */
class Joursemaine
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_jour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJour;

    /**
     * @var bool
     *
     * @ORM\Column(name="Lundi", type="boolean", nullable=false)
     */
    private $lundi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Mardi", type="boolean", nullable=false)
     */
    private $mardi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Mercredi", type="boolean", nullable=false)
     */
    private $mercredi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Jeudi", type="boolean", nullable=false)
     */
    private $jeudi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Vendredi", type="boolean", nullable=false)
     */
    private $vendredi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Samedi", type="boolean", nullable=false)
     */
    private $samedi;

    /**
     * @var bool
     *
     * @ORM\Column(name="Dimanche", type="boolean", nullable=false)
     */
    private $dimanche;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artisan", inversedBy="idJour")
     * @ORM\JoinTable(name="selectionne",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_jour", referencedColumnName="Id_jour")
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

    public function getIdJour(): ?int
    {
        return $this->idJour;
    }

    public function getLundi(): ?bool
    {
        return $this->lundi;
    }

    public function setLundi(bool $lundi): self
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?bool
    {
        return $this->mardi;
    }

    public function setMardi(bool $mardi): self
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?bool
    {
        return $this->mercredi;
    }

    public function setMercredi(bool $mercredi): self
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?bool
    {
        return $this->jeudi;
    }

    public function setJeudi(bool $jeudi): self
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?bool
    {
        return $this->vendredi;
    }

    public function setVendredi(bool $vendredi): self
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?bool
    {
        return $this->samedi;
    }

    public function setSamedi(bool $samedi): self
    {
        $this->samedi = $samedi;

        return $this;
    }

    public function getDimanche(): ?bool
    {
        return $this->dimanche;
    }

    public function setDimanche(bool $dimanche): self
    {
        $this->dimanche = $dimanche;

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
