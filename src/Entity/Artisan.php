<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Artisan
 *
 * @ORM\Table(name="artisan", indexes={@ORM\Index(name="artisan_service_commercial0_FK", columns={"Id_commercial"}), @ORM\Index(name="artisan_formules_FK", columns={"Id_formule"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArtisanRepository")
 */
class Artisan implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_artisan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArtisan;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Raison_sociale", type="string", length=50, nullable=false)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="SIREN", type="string", length=20, nullable=false)
     */
    private $siren;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel", type="string", length=10, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=100, nullable=false)
     */
    private $mail;
	
	/**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=300, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Motdepasse", type="string", length=100, nullable=false)
     */
    private $motdepasse;
	
	/**
     * @var string
     */
    private $verif_motdepasse;
	
	 /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_numero_artisan", type="string", length=20, nullable=false)
     */
    private $adresseInterventionNumeroArtisan;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_rue_artisan", type="string", length=300, nullable=false)
     */
    private $adresseInterventionRueArtisan;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_ville_artisan", type="string", length=300, nullable=false)
     */
    private $adresseInterventionVilleArtisan;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_intervention_cp_artisan", type="string", length=6, nullable=false)
     */
    private $adresseInterventionCpArtisan;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_complementaire_artisan", type="string", length=200, nullable=false)
     */
    private $adresseComplementaireArtisan;


    /**
     * @var string
     *
     * @ORM\Column(name="Num_assurance", type="string", length=20, nullable=false)
     */
    private $numAssurance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_inscription", type="datetime", nullable=false)
     */
    private $dateInscription;

    /**
     * @var int
     *
     * @ORM\Column(name="Credit", type="integer", nullable=false)
     */
    private $credit = 3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin_gratuite", type="datetime", nullable=true)
     */
    private $dateFinGratuite = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin_engagement", type="datetime", nullable=true)
     */
    private $dateFinEngagement = null;

    /**
     * @var float
     *
     * @ORM\Column(name="Coordonnee_longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordonneeLongitude;

    /**
     * @var float
     *
     * @ORM\Column(name="Coordonnee_latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordonneeLatitude;

    /**
     * @var int
     *
     * @ORM\Column(name="Avantage_artisan", type="integer", nullable=false)
     */
    private $avantageArtisan = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_debut_arret_reception", type="datetime", nullable=true)
     */
    private $dateDebutArretReception = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin_arret_reception", type="datetime", nullable=true)
     */
    private $dateFinArretReception = null;

    /**
     * @var \Formules
     *
     * @ORM\ManyToOne(targetEntity="Formules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_formule", referencedColumnName="Id_formule")
     * })
     */
    private $idFormule;

    /**
     * @var \ServiceCommercial
     *
     * @ORM\ManyToOne(targetEntity="ServiceCommercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_commercial", referencedColumnName="Id_commercial")
     * })
     */
    private $idCommercial;

    /**
     * @var \ServiceCommercial
     *
     * @ORM\ManyToOne(targetEntity="ServiceCommercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_commercial_service_commercial", referencedColumnName="Id_commercial")
     * })
     */
    private $idCommercialServiceCommercial;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jour", inversedBy="idArtisan")
     * @ORM\JoinTable(name="etre_dispo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_horaire", referencedColumnName="Id_horaire")
     *   }
     * )
     */
    private $idHoraire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="idArtisan")
     * @ORM\JoinTable(name="proposer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_service", referencedColumnName="Id_service")
     *   }
     * )
     */
    private $idService;
	
	/**
     * @var array
     *
     */
    private $tableauService = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idHoraire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idService = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdArtisan(): ?int
    {
        return $this->idArtisan;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

	 public function getAdresseInterventionNumeroArtisan(): ?string
    {
        return $this->adresseInterventionNumeroArtisan;
    }

    public function setAdresseInterventionNumeroArtisan(string $adresseInterventionNumeroArtisan): self
    {
        $this->adresseInterventionNumeroArtisan = $adresseInterventionNumeroArtisan;

        return $this;
    }

    public function getAdresseInterventionRueArtisan(): ?string
    {
        return $this->adresseInterventionRueArtisan;
    }

    public function setAdresseInterventionRueArtisan(string $adresseInterventionRueArtisan): self
    {
        $this->adresseInterventionRueArtisan = $adresseInterventionRueArtisan;

        return $this;
    }

    public function getAdresseInterventionVilleArtisan(): ?string
    {
        return $this->adresseInterventionVilleArtisan;
    }

    public function setAdresseInterventionVilleArtisan(string $adresseInterventionVilleArtisan): self
    {
        $this->adresseInterventionVilleArtisan = $adresseInterventionVilleArtisan;

        return $this;
    }

    public function getAdresseInterventionCpArtisan(): ?string
    {
        return $this->adresseInterventionCpArtisan;
    }

    public function setAdresseInterventionCpArtisan(string $adresseInterventionArtisan): self
    {
        $this->adresseInterventionCpArtisan = $adresseInterventionArtisan;

        return $this;
    }

    public function getAdresseComplementaireArtisan(): ?string
    {
        return $this->adresseComplementaireArtisan;
    }

    public function setAdresseComplementaireArtisan(string $adresseComplementaireArtisan): self
    {
        $this->adresseComplementaireArtisan = $adresseComplementaireArtisan;

        return $this;
    }
	
    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getVerifMotdepasse(): ?string
    {
        return $this->verif_motdepasse;
    }

    public function setVerifMotdepasse(string $verifmotdepasse): self
    {
        $this->verif_motdepasse = $verifmotdepasse;

        return $this;
    }

	 /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mail;
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
        return (string) $this->motdepasse;
    }

    public function setPassword(string $password): self
    {
        $this->motdepasse = $password;

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

    public function getNumAssurance(): ?string
    {
        return $this->numAssurance;
    }

    public function setNumAssurance(string $numAssurance): self
    {
        $this->numAssurance = $numAssurance;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDateFinGratuite(): ?\DateTimeInterface
    {
        return $this->dateFinGratuite;
    }

    public function setDateFinGratuite(\DateTimeInterface $dateFinGratuite): self
    {
        $this->dateFinGratuite = $dateFinGratuite;

        return $this;
    }

    public function getDateFinEngagement(): ?\DateTimeInterface
    {
        return $this->dateFinEngagement;
    }

    public function setDateFinEngagement(\DateTimeInterface $dateFinEngagement): self
    {
        $this->dateFinEngagement = $dateFinEngagement;

        return $this;
    }

    public function getCoordonneeLongitude(): ?float
    {
        return $this->coordonneeLongitude;
    }

    public function setCoordonneeLongitude(float $coordonneeLongitude): self
    {
        $this->coordonneeLongitude = $coordonneeLongitude;

        return $this;
    }

    public function getCoordonneeLatitude(): ?float
    {
        return $this->coordonneeLatitude;
    }

    public function setCoordonneeLatitude(float $coordonneeLatitude): self
    {
        $this->coordonneeLatitude = $coordonneeLatitude;

        return $this;
    }

    public function getAvantageArtisan(): ?int
    {
        return $this->avantageArtisan;
    }

    public function setAvantageArtisan(int $avantageArtisan): self
    {
        $this->avantageArtisan = $avantageArtisan;

        return $this;
    }

    public function getDateDebutArretReception(): ?\DateTimeInterface
    {
        return $this->dateDebutArretReception;
    }

    public function setDateDebutArretReception(\DateTimeInterface $dateDebutArretReception): self
    {
        $this->dateDebutArretReception = $dateDebutArretReception;

        return $this;
    }

    public function getDateFinArretReception(): ?\DateTimeInterface
    {
        return $this->dateFinArretReception;
    }

    public function setDateFinArretReception(\DateTimeInterface $dateFinArretReception): self
    {
        $this->dateFinArretReception = $dateFinArretReception;

        return $this;
    }

    public function getIdFormule(): ?Formules
    {
        return $this->idFormule;
    }

    public function setIdFormule(?Formules $idFormule): self
    {
        $this->idFormule = $idFormule;

        return $this;
    }

    public function getIdCommercial(): ?ServiceCommercial
    {
        return $this->idCommercial;
    }

    public function setIdCommercial(?ServiceCommercial $idCommercial): self
    {
        $this->idCommercial = $idCommercial;

        return $this;
    }

    public function getIdCommercialServiceCommercial(): ?ServiceCommercial
    {
        return $this->idCommercialServiceCommercial;
    }

    public function setIdCommercialServiceCommercial(?ServiceCommercial $idCommercialServiceCommercial): self
    {
        $this->idCommercialServiceCommercial = $idCommercialServiceCommercial;

        return $this;
    }

    /**
     * @return Collection|Jour[]
     */
    public function getIdHoraire(): Collection
    {
        return $this->idHoraire;
    }

    public function addIdHoraire(Jour $idHoraire): self
    {
        if (!$this->idHoraire->contains($idHoraire)) {
            $this->idHoraire[] = $idHoraire;
            $idHoraire->addIdArtisan($this);
        }

        return $this;
    }

    public function removeIdHoraire(Jour $idHoraire): self
    {
        if ($this->idHoraire->contains($idHoraire)) {
            $this->idHoraire->removeElement($idHoraire);
            $idHoraire->removeIdArtisan($this);
        }

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getIdService(): Collection
    {
        return $this->idService;
    }

    public function addIdService(Service $idService): self
    {
        if (!$this->idService->contains($idService)) {
            $this->idService[] = $idService;
        }

        return $this;
    }

    public function removeIdService(Service $idService): self
    {
        if ($this->idService->contains($idService)) {
            $this->idService->removeElement($idService);
        }

        return $this;
    }
	
	public function getTableauService(): Array
    {
        return $this->tableauService;
    }

    public function setTableauService(Array $tableauservice): self
    {
        $this->tableauService = $tableauservice;

        return $this;
    }
}
