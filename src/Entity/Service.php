<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_service", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_service", type="string", length=250, nullable=false)
     */
    private $nomService;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artisan", mappedBy="idService")
     */
    private $idArtisan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idArtisan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdService(): ?int
    {
        return $this->idService;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): self
    {
        $this->nomService = $nomService;

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
            $idArtisan->addIdService($this);
        }

        return $this;
    }

    public function removeIdArtisan(Artisan $idArtisan): self
    {
        if ($this->idArtisan->contains($idArtisan)) {
            $this->idArtisan->removeElement($idArtisan);
            $idArtisan->removeIdService($this);
        }

        return $this;
    }

}
