<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin implements UserInterface
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
     * @ORM\Column(type="json")
     */
    private $roles = [];
	
    /**
     * @var bool
     *
     * @ORM\Column(name="Reinitialisation_mdp_admin", type="boolean", nullable=false)
     */
    private $reinitialisationMdpAdmin;
	
	 /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mailAdmin;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->motDePasseAdmin;
    }

    public function setPassword(string $password): self
    {
        $this->motDePasseAdmin = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

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
