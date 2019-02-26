<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choisir
 *
 * @ORM\Table(name="choisir", indexes={@ORM\Index(name="choisir_client0_FK", columns={"Id_client"}), @ORM\Index(name="choisir_artisan_FK", columns={"Id_artisan"})})
  * @ORM\Entity(repositoryClass="App\Repository\ChoisirRepository")
 */
class Choisir
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_choisir", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idChoisir;

    /**
     * @var bool
     *
     * @ORM\Column(name="visualise", type="boolean", nullable=false)
     */
    private $visualise;

    /**
     * @var bool
     *
     * @ORM\Column(name="refuser", type="boolean", nullable=false)
     */
    private $refuser;

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

    public function getIdChoisir(): ?int
    {
        return $this->idChoisir;
    }

    public function getVisualise(): ?bool
    {
        return $this->visualise;
    }

    public function setVisualise(bool $visualise): self
    {
        $this->visualise = $visualise;

        return $this;
    }

    public function getRefuser(): ?bool
    {
        return $this->refuser;
    }

    public function setRefuser(bool $refuser): self
    {
        $this->refuser = $refuser;

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
