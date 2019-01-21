<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_admin", type="string", length=100, nullable=false)
     */
    private $mailAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Motdepasse_admin", type="string", length=100, nullable=false)
     */
    private $motdepasseAdmin;

    /**
     * @var bool
     *
     * @ORM\Column(name="Reinitialisation_mdp_admin", type="boolean", nullable=false)
     */
    private $reinitialisationMdpAdmin;

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }

    public function getMailAdmin(): ?string
    {
        return $this->mailAdmin;
    }

    public function setMailAdmin(string $mailAdmin): self
    {
        $this->mailAdmin = $mailAdmin;

        return $this;
    }

    public function getMotdepasseAdmin(): ?string
    {
        return $this->motdepasseAdmin;
    }

    public function setMotdepasseAdmin(string $motdepasseAdmin): self
    {
        $this->motdepasseAdmin = $motdepasseAdmin;

        return $this;
    }

    public function getReinitialisationMdpAdmin(): ?bool
    {
        return $this->reinitialisationMdpAdmin;
    }

    public function setReinitialisationMdpAdmin(bool $reinitialisationMdpAdmin): self
    {
        $this->reinitialisationMdpAdmin = $reinitialisationMdpAdmin;

        return $this;
    }


}
