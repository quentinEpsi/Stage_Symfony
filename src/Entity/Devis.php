<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="DEVIS_ARTISAN_FK", columns={"Id_artisan"}), @ORM\Index(name="DEVIS_CLIENT0_FK", columns={"Id_client"})})
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
     * @ORM\Column(name="Date_envoi", type="date", nullable=false)
     */
    private $dateEnvoi;

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

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

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
