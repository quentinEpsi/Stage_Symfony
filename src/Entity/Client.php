<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="client_etat_avancement0_FK", columns={"Id_etat_avancement"}), @ORM\Index(name="client_service_FK", columns={"Id_service"})})
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
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
     * @ORM\Column(name="Nom_client", type="string", length=100, nullable=false)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_client", type="string", length=100, nullable=false)
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_numero", type="string", length=20, nullable=false)
     */
    private $adresseInterventionNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_rue", type="string", length=300, nullable=false)
     */
    private $adresseInterventionRue;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_ville", type="string", length=300, nullable=false)
     */
    private $adresseInterventionVille;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_cp", type="string", length=6, nullable=false)
     */
    private $adresseInterventionCp;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_complementaire_client", type="string", length=200, nullable=false)
     */
    private $adresseComplementaireClient;

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
     * @ORM\Column(name="Description_sup", type="string", length=250, nullable=false)
     */
    private $descriptionSup;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_proposition", type="datetime", nullable=false)
     */
    private $dateProposition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_realisation", type="datetime", nullable=false)
     */
    private $dateRealisation;

    /**
     * @var float
     *
     * @ORM\Column(name="Coordonnee_longitude_client", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordonneeLongitudeClient;

    /**
     * @var float
     *
     * @ORM\Column(name="Coordonnee_latitude_client", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordonneeLatitudeClient;

    /**
     * @var \EtatAvancement
     *
     * @ORM\ManyToOne(targetEntity="EtatAvancement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_etat_avancement", referencedColumnName="Id_etat_avancement")
     * })
     */
    private $idEtatAvancement;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_service", referencedColumnName="Id_service")
     * })
     */
    private $idService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idArtisan = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getAdresseInterventionNumero(): ?string
    {
        return $this->adresseInterventionNumero;
    }

    public function setAdresseInterventionNumero(string $adresseInterventionNumero): self
    {
        $this->adresseInterventionNumero = $adresseInterventionNumero;

        return $this;
    }

    public function getAdresseInterventionRue(): ?string
    {
        return $this->adresseInterventionRue;
    }

    public function setAdresseInterventionRue(string $adresseInterventionRue): self
    {
        $this->adresseInterventionRue = $adresseInterventionRue;

        return $this;
    }

    public function getAdresseInterventionVille(): ?string
    {
        return $this->adresseInterventionVille;
    }

    public function setAdresseInterventionVille(string $adresseInterventionVille): self
    {
        $this->adresseInterventionVille = $adresseInterventionVille;

        return $this;
    }

    public function getAdresseInterventionCp(): ?string
    {
        return $this->adresseInterventionCp;
    }

    public function setAdresseInterventionCp(string $adresseInterventionCp): self
    {
        $this->adresseInterventionCp = $adresseInterventionCp;

        return $this;
    }

    public function getAdresseComplementaireClient(): ?string
    {
        return $this->adresseComplementaireClient;
    }

    public function setAdresseComplementaireClient(string $adresseComplementaireClient): self
    {
        $this->adresseComplementaireClient = $adresseComplementaireClient;

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

    public function getDescriptionSup(): ?string
    {
        return $this->descriptionSup;
    }

    public function setDescriptionSup(string $descriptionSup): self
    {
        $this->descriptionSup = $descriptionSup;

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

    public function getCoordonneeLongitudeClient(): ?float
    {
        return $this->coordonneeLongitudeClient;
    }

    public function setCoordonneeLongitudeClient(float $coordonneeLongitudeClient): self
    {
        $this->coordonneeLongitudeClient = $coordonneeLongitudeClient;

        return $this;
    }

    public function getCoordonneeLatitudeClient(): ?float
    {
        return $this->coordonneeLatitudeClient;
    }

    public function setCoordonneeLatitudeClient(float $coordonneeLatitudeClient): self
    {
        $this->coordonneeLatitudeClient = $coordonneeLatitudeClient;

        return $this;
    }

    public function getIdEtatAvancement(): ?EtatAvancement
    {
        return $this->idEtatAvancement;
    }

    public function setIdEtatAvancement(?EtatAvancement $idEtatAvancement): self
    {
        $this->idEtatAvancement = $idEtatAvancement;

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
