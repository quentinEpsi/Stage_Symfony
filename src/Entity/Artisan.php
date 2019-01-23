<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artisan
 *
 * @ORM\Table(name="artisan", indexes={@ORM\Index(name="artisan_formules_FK", columns={"Id_formule"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArtisanRepository")
 */
class Artisan
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
     * @ORM\Column(name="Nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Raison_sociale", type="string", length=150, nullable=false)
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
     * @ORM\Column(name="Tel", type="string", length=16, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=250, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Motdepasse", type="string", length=150, nullable=false)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_assurance", type="string", length=20, nullable=false)
     */
    private $numAssurance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_inscription", type="date", nullable=false)
     */
    private $dateInscription;

    /**
     * @var int
     *
     * @ORM\Column(name="Credit", type="integer", nullable=false)
     */
    private $credit;

    /**
     * @var int
     *
     * @ORM\Column(name="Devis_max", type="integer", nullable=false)
     */
    private $devisMax;

    /**
     * @var int
     *
     * @ORM\Column(name="Disponibilite", type="integer", nullable=false)
     */
    private $disponibilite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_debut_arret_reception", type="datetime", nullable=false)
     */
    private $dateDebutArretReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin_arret_reception", type="datetime", nullable=false)
     */
    private $dateFinArretReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin_engagement", type="datetime", nullable=false)
     */
    private $dateFinEngagement;

    /**
     * @var int
     *
     * @ORM\Column(name="Avantage", type="integer", nullable=false)
     */
    private $avantage;

    /**
     * @var bool
     *
     * @ORM\Column(name="Reinitialisation_mdp_artisan", type="boolean", nullable=false)
     */
    private $reinitialisationMdpArtisan;

    /**
     * @var bool
     *
     * @ORM\Column(name="Validation_assurance", type="boolean", nullable=false)
     */
    private $validationAssurance;

    /**
     * @var bool
     *
     * @ORM\Column(name="Validation_artisan", type="boolean", nullable=false)
     */
    private $validationArtisan;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="idArtisan")
     * @ORM\JoinTable(name="appartient",
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="idArtisan")
     */
    private $idClient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idService = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idClient = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getDevisMax(): ?int
    {
        return $this->devisMax;
    }

    public function setDevisMax(int $devisMax): self
    {
        $this->devisMax = $devisMax;

        return $this;
    }

    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(int $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

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

    public function getDateFinEngagement(): ?\DateTimeInterface
    {
        return $this->dateFinEngagement;
    }

    public function setDateFinEngagement(\DateTimeInterface $dateFinEngagement): self
    {
        $this->dateFinEngagement = $dateFinEngagement;

        return $this;
    }

    public function getAvantage(): ?int
    {
        return $this->avantage;
    }

    public function setAvantage(int $avantage): self
    {
        $this->avantage = $avantage;

        return $this;
    }

    public function getReinitialisationMdpArtisan(): ?bool
    {
        return $this->reinitialisationMdpArtisan;
    }

    public function setReinitialisationMdpArtisan(bool $reinitialisationMdpArtisan): self
    {
        $this->reinitialisationMdpArtisan = $reinitialisationMdpArtisan;

        return $this;
    }

    public function getValidationAssurance(): ?bool
    {
        return $this->validationAssurance;
    }

    public function setValidationAssurance(bool $validationAssurance): self
    {
        $this->validationAssurance = $validationAssurance;

        return $this;
    }

    public function getValidationArtisan(): ?bool
    {
        return $this->validationArtisan;
    }

    public function setValidationArtisan(bool $validationArtisan): self
    {
        $this->validationArtisan = $validationArtisan;

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

    /**
     * @return Collection|Client[]
     */
    public function getIdClient(): Collection
    {
        return $this->idClient;
    }

    public function addIdClient(Client $idClient): self
    {
        if (!$this->idClient->contains($idClient)) {
            $this->idClient[] = $idClient;
            $idClient->addIdArtisan($this);
        }

        return $this;
    }

    public function removeIdClient(Client $idClient): self
    {
        if ($this->idClient->contains($idClient)) {
            $this->idClient->removeElement($idClient);
            $idClient->removeIdArtisan($this);
        }

        return $this;
    }

}
