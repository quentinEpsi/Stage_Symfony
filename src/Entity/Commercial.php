<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commercial
 *
 * @ORM\Table(name="commercial")
 * @ORM\Entity(repositoryClass="App\Repository\CommercialRepository")
 */
class Commercial
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_commercial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_commercial", type="string", length=100, nullable=false)
     */
    private $mailCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="Motdepasse_commercial", type="string", length=100, nullable=false)
     */
    private $motdepasseCommercial;

    /**
     * @var bool
     *
     * @ORM\Column(name="Reinitialisation_mdp_commercial", type="boolean", nullable=false)
     */
    private $reinitialisationMdpCommercial;

    public function getIdCommercial(): ?int
    {
        return $this->idCommercial;
    }

    public function getMailCommercial(): ?string
    {
        return $this->mailCommercial;
    }

    public function setMailCommercial(string $mailCommercial): self
    {
        $this->mailCommercial = $mailCommercial;

        return $this;
    }

    public function getMotdepasseCommercial(): ?string
    {
        return $this->motdepasseCommercial;
    }

    public function setMotdepasseCommercial(string $motdepasseCommercial): self
    {
        $this->motdepasseCommercial = $motdepasseCommercial;

        return $this;
    }

    public function getReinitialisationMdpCommercial(): ?bool
    {
        return $this->reinitialisationMdpCommercial;
    }

    public function setReinitialisationMdpCommercial(bool $reinitialisationMdpCommercial): self
    {
        $this->reinitialisationMdpCommercial = $reinitialisationMdpCommercial;

        return $this;
    }


}
