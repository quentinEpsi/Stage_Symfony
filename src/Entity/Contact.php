<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]{10}/"
     * )
     */
    private $phone;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $objet;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;
    /**
     * @return null|string
     */

    /**
     * @var string|null
     * @Assert\NotBlank()
     *
     */
    private $rue;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]{5}/"
     * )
     */
    private $cp;
    /**
     * @var string|null
     * @Assert\NotBlank()
     *
     */
    private $ville;

    /**
     * @return null|string
     */
    public function getRue(): ?string
    {
        return $this->rue;
    }

    /**
     * @param null|string $rue
     */
    public function setRue(?string $rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return null|string
     */
    public function getCp(): ?string
    {
        return $this->cp;
    }

    /**
     * @param null|string $cp
     */
    public function setCp(?string $cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return null|string
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * @param null|string $ville
     */
    public function setVille(?string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return null|string
     */
    public function getNumDeRue(): ?string
    {
        return $this->numDeRue;
    }

    /**
     * @param null|string $numDeRue
     */
    public function setNumDeRue(?string $numDeRue): void
    {
        $this->numDeRue = $numDeRue;
    }
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]/"
     * )
     */
    private $numDeRue;


    public function getObjet(): ?string
    {
        return $this->objet;
    }
    /**
     * @param null|string $objet
     */
    public function setObjet(?string $objet): void
    {
        $this->objet = $objet;
    }
    /**
     * @return null|string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    /**
     * @param null|string $firstname
     * @return Contact
     */
    public function setFirstname(?string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    /**
     * @param null|string $lastname
     * @return Contact
     */
    public function setLastname(?string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * @param null|string $phone
     * @return Contact
     */
    public function setPhone(?string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * @param null|string $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * @param null|string $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }
}