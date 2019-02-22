<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Superadmin
 *
 * @ORM\Table(name="superadmin")
 * @ORM\Entity
 */
class Superadmin
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_super_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSuperAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_super_admin", type="string", length=100, nullable=false)
     */
    private $mailSuperAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Mot_de_passe_super_admin", type="string", length=100, nullable=false)
     */
    private $motDePasseSuperAdmin;

    public function getIdSuperAdmin(): ?int
    {
        return $this->idSuperAdmin;
    }

    public function getMailSuperAdmin(): ?string
    {
        return $this->mailSuperAdmin;
    }

    public function setMailSuperAdmin(string $mailSuperAdmin): self
    {
        $this->mailSuperAdmin = $mailSuperAdmin;

        return $this;
    }

    public function getMotDePasseSuperAdmin(): ?string
    {
        return $this->motDePasseSuperAdmin;
    }

    public function setMotDePasseSuperAdmin(string $motDePasseSuperAdmin): self
    {
        $this->motDePasseSuperAdmin = $motDePasseSuperAdmin;

        return $this;
    }


}
