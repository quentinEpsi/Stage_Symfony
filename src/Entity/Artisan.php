<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artisan
 *
 * @ORM\Table(name="artisan", indexes={@ORM\Index(name="ARTISAN_FORMULES_FK", columns={"Id_formule"})})
 * @ORM\Entity
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
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Raison_sociale", type="string", length=100, nullable=false)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="SIREN", type="string", length=10, nullable=false)
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
     * @ORM\Column(name="Mail", type="string", length=50, nullable=false)
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
     * @ORM\Column(name="Motdepasse", type="string", length=100, nullable=false)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_assurance", type="string", length=30, nullable=false)
     */
    private $numAssurance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_inscription", type="date", nullable=false)
     */
    private $dateInscription;

    /**
     * @var bool
     *
     * @ORM\Column(name="Confirmation_mail", type="boolean", nullable=false)
     */
    private $confirmationMail;

    /**
     * @var float
     *
     * @ORM\Column(name="Credit", type="float", precision=10, scale=0, nullable=false)
     */
    private $credit;

    /**
     * @var int
     *
     * @ORM\Column(name="Devis_max", type="integer", nullable=false)
     */
    private $devisMax;

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
     * @ORM\ManyToMany(targetEntity="Service", mappedBy="idArtisan")
     */
    private $idService;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Horaires", mappedBy="idArtisan")
     */
    private $idHoraire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Joursemaine", mappedBy="idArtisan")
     */
    private $idJour;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idService = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idHoraire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idJour = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getConfirmationMail(): ?bool
    {
        return $this->confirmationMail;
    }

    public function setConfirmationMail(bool $confirmationMail): self
    {
        $this->confirmationMail = $confirmationMail;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(float $credit): self
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
            $idService->addIdArtisan($this);
        }

        return $this;
    }

    public function removeIdService(Service $idService): self
    {
        if ($this->idService->contains($idService)) {
            $this->idService->removeElement($idService);
            $idService->removeIdArtisan($this);
        }

        return $this;
    }

    /**
     * @return Collection|Horaires[]
     */
    public function getIdHoraire(): Collection
    {
        return $this->idHoraire;
    }

    public function addIdHoraire(Horaires $idHoraire): self
    {
        if (!$this->idHoraire->contains($idHoraire)) {
            $this->idHoraire[] = $idHoraire;
            $idHoraire->addIdArtisan($this);
        }

        return $this;
    }

    public function removeIdHoraire(Horaires $idHoraire): self
    {
        if ($this->idHoraire->contains($idHoraire)) {
            $this->idHoraire->removeElement($idHoraire);
            $idHoraire->removeIdArtisan($this);
        }

        return $this;
    }

    /**
     * @return Collection|Joursemaine[]
     */
    public function getIdJour(): Collection
    {
        return $this->idJour;
    }

    public function addIdJour(Joursemaine $idJour): self
    {
        if (!$this->idJour->contains($idJour)) {
            $this->idJour[] = $idJour;
            $idJour->addIdArtisan($this);
        }

        return $this;
    }

    public function removeIdJour(Joursemaine $idJour): self
    {
        if ($this->idJour->contains($idJour)) {
            $this->idJour->removeElement($idJour);
            $idJour->removeIdArtisan($this);
        }

        return $this;
    }

}
