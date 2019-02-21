<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ServiceCommercial
 *
 * @ORM\Table(name="service_commercial")
 * @ORM\Entity(repositoryClass="App\Repository\ServiceCommercialRepository")
 */
class ServiceCommercial implements UserInterface
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
     * @ORM\Column(type="json")
     */
    private $roles = [];
	
    /**
     * @var bool
     *
     * @ORM\Column(name="Reinitialisation_mdp_commercial", type="boolean", nullable=false)
     */
    private $reinitialisationMdpCommercial;
	
	/**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mailCommercial;
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
        return (string) $this->motdepasseCommercial;
    }

    public function setPassword(string $password): self
    {
        $this->motdepasseCommercial = $password;

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
