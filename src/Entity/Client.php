<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="CLIENT_SERVICE_FK", columns={"Id_service"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_client", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_client", type="string", length=50, nullable=false)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_client", type="string", length=50, nullable=false)
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention", type="string", length=100, nullable=false)
     */
    private $adresseIntervention;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel_client", type="string", length=10, nullable=false)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_client", type="string", length=100, nullable=false)
     */
    private $mailClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_supp", type="string", length=250, nullable=false)
     */
    private $descriptionSupp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_proposition", type="date", nullable=false)
     */
    private $dateProposition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_realisation", type="date", nullable=false)
     */
    private $dateRealisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_avancement", type="string", length=50, nullable=false)
     */
    private $etatAvancement;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_service", referencedColumnName="Id_service")
     * })
     */
    private $idService;

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getAdresseIntervention(): ?string
    {
        return $this->adresseIntervention;
    }

    public function setAdresseIntervention(string $adresseIntervention): self
    {
        $this->adresseIntervention = $adresseIntervention;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    public function getDescriptionSupp(): ?string
    {
        return $this->descriptionSupp;
    }

    public function setDescriptionSupp(string $descriptionSupp): self
    {
        $this->descriptionSupp = $descriptionSupp;

        return $this;
    }

    public function getDateProposition(): ?\DateTimeInterface
    {
        return $this->dateProposition;
    }

    public function setDateProposition(\DateTimeInterface $dateProposition): self
    {
        $this->dateProposition = $dateProposition;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(\DateTimeInterface $dateRealisation): self
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }

    public function getEtatAvancement(): ?string
    {
        return $this->etatAvancement;
    }

    public function setEtatAvancement(string $etatAvancement): self
    {
        $this->etatAvancement = $etatAvancement;

        return $this;
    }

    public function getIdService(): ?Service
    {
        return $this->idService;
    }

    public function setIdService(?Service $idService): self
    {
        $this->idService = $idService;

        return $this;
    }


}
