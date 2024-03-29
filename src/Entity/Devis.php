<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="devis_client0_FK", columns={"Id_client"}), @ORM\Index(name="devis_artisan_FK", columns={"Id_artisan"})})
 * @ORM\Entity(repositoryClass="App\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_devis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_envoie", type="datetime", nullable=false)
     */
    private $dateEnvoie;


     /**
     * @ORM\Column(name="Fichier_joint", type="string", length=200, nullable=false)
     * @var string
     */
    private $fichierJoint;

    /**
     * @var bool
     *
     * @ORM\Column(name="Validation_devis", type="boolean", nullable=false)
     */
    private $validationDevis;

    /**
     * @var int
     *
     * @ORM\Column(name="Avantage_devis", type="integer", nullable=false)
     */
    private $avantageDevis;

    /**
     * @var bool
     *
     * @ORM\Column(name="Refus_devis", type="boolean", nullable=false)
     */
    private $refusDevis;

    /**
     * @var bool
     *
     * @ORM\Column(name="visualise_devis", type="boolean", nullable=false)
     */
    private $visualiseDevis;

    /**
     * @var \Artisan
     *
     * @ORM\ManyToOne(targetEntity="Artisan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     * })
     */
    private $idArtisan;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_client", referencedColumnName="Id_client")
     * })
     */
    private $idClient;

    public function getIdDevis(): ?int
    {
        return $this->idDevis;
    }

    public function getDateEnvoie(): ?\DateTimeInterface
    {
        return $this->dateEnvoie;
    }

    public function setDateEnvoie(\DateTimeInterface $dateEnvoie): self
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }

    public function getFichierJoint()
    {
        return $this->fichierJoint;
    }

    public function setFichierJoint(string $fichierJoint)
    {
        $this->fichierJoint = $fichierJoint;

        return $this;
    }

    public function getValidationDevis(): ?bool
    {
        return $this->validationDevis;
    }

    public function setValidationDevis(bool $validationDevis): self
    {
        $this->validationDevis = $validationDevis;

        return $this;
    }

    public function getAvantageDevis(): ?int
    {
        return $this->avantageDevis;
    }

    public function setAvantageDevis(int $avantageDevis): self
    {
        $this->avantageDevis = $avantageDevis;

        return $this;
    }

    public function getRefusDevis(): ?bool
    {
        return $this->refusDevis;
    }

    public function setRefusDevis(bool $refusDevis): self
    {
        $this->refusDevis = $refusDevis;

        return $this;
    }

    public function getVisualiseDevis(): ?bool
    {
        return $this->visualiseDevis;
    }

    public function setVisualiseDevis(bool $visualiseDevis): self
    {
        $this->visualiseDevis = $visualiseDevis;

        return $this;
    }

    public function getIdArtisan(): ?Artisan
    {
        return $this->idArtisan;
    }

    public function setIdArtisan(?Artisan $idArtisan): self
    {
        $this->idArtisan = $idArtisan;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }
    
      
}
