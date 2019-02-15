<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
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
     * @ORM\Column(name="Mot_de_passe_admin", type="string", length=100, nullable=false)
     */
    private $motDePasseAdmin;

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

    public function getMotDePasseAdmin(): ?string
    {
        return $this->motDePasseAdmin;
    }

    public function setMotDePasseAdmin(string $motDePasseAdmin): self
    {
        $this->motDePasseAdmin = $motDePasseAdmin;

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
