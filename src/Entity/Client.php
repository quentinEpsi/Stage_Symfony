<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="client_service_FK", columns={"Id_service"})})
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
     * @ORM\Column(name="Adresse_intervention", type="string", length=150, nullable=false)
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
     * @ORM\Column(name="Date_realisation_debut", type="datetime", nullable=false)
     */
    private $dateRealisationDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_realisation_fin", type="datetime", nullable=false)
     */
    private $dateRealisationFin;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_avancement", type="string", length=250, nullable=false)
     */
    private $etatAvancement;

    /**
     * @var string
     *
     * @ORM\Column(name="Liste_id_artisan", type="string", length=400, nullable=false)
     */
    private $listeIdArtisan;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artisan", inversedBy="idClient")
     * @ORM\JoinTable(name="visualise",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_client", referencedColumnName="Id_client")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     *   }
     * )
     */
    private $idArtisan;

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

    public function getDateRealisationDebut(): ?\DateTimeInterface
    {
        return $this->dateRealisationDebut;
    }

    public function setDateRealisationDebut(\DateTimeInterface $dateRealisationDebut): self
    {
        $this->dateRealisationDebut = $dateRealisationDebut;

        return $this;
    }

    public function getDateRealisationFin(): ?\DateTimeInterface
    {
        return $this->dateRealisationFin;
    }

    public function setDateRealisationFin(\DateTimeInterface $dateRealisationFin): self
    {
        $this->dateRealisationFin = $dateRealisationFin;

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

    public function getListeIdArtisan(): ?string
    {
        return $this->listeIdArtisan;
    }

    public function setListeIdArtisan(string $listeIdArtisan): self
    {
        $this->listeIdArtisan = $listeIdArtisan;

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

    /**
     * @return Collection|Artisan[]
     */
    public function getIdArtisan(): Collection
    {
        return $this->idArtisan;
    }

    public function addIdArtisan(Artisan $idArtisan): self
    {
        if (!$this->idArtisan->contains($idArtisan)) {
            $this->idArtisan[] = $idArtisan;
        }

        return $this;
    }

    public function removeIdArtisan(Artisan $idArtisan): self
    {
        if ($this->idArtisan->contains($idArtisan)) {
            $this->idArtisan->removeElement($idArtisan);
        }

        return $this;
    }

}
