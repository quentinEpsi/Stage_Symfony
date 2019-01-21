<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="devis_client0_FK", columns={"Id_client"}), @ORM\Index(name="devis_artisan_FK", columns={"Id_artisan"})})
 * @ORM\Entity
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
     * @var string
     *
     * @ORM\Column(name="Nom_devis", type="string", length=100, nullable=false)
     */
    private $nomDevis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_envoie", type="datetime", nullable=false)
     */
    private $dateEnvoie;

    /**
     * @var string
     *
     * @ORM\Column(name="Fichier_joint", type="string", length=100, nullable=false)
     */
    private $fichierJoint;

    /**
     * @var bool
     *
     * @ORM\Column(name="modifier", type="boolean", nullable=false)
     */
    private $modifier;

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

    public function getNomDevis(): ?string
    {
        return $this->nomDevis;
    }

    public function setNomDevis(string $nomDevis): self
    {
        $this->nomDevis = $nomDevis;

        return $this;
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

    public function getFichierJoint(): ?string
    {
        return $this->fichierJoint;
    }

    public function setFichierJoint(string $fichierJoint): self
    {
        $this->fichierJoint = $fichierJoint;

        return $this;
    }

    public function getModifier(): ?bool
    {
        return $this->modifier;
    }

    public function setModifier(bool $modifier): self
    {
        $this->modifier = $modifier;

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
