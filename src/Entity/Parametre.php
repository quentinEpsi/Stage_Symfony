<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity(repositoryClass="App\Repository\ParametreRepository")
 */
class Parametre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_parametre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParametre;

    /**
     * @var string
     *
     * @ORM\Column(name="Periode_gratuite", type="string", length=50, nullable=false)
     */
    private $periodeGratuite;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix_reception_demande", type="integer", nullable=false)
     */
    private $prixReceptionDemande;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix_validation_demande", type="integer", nullable=false)
     */
    private $prixValidationDemande;

    /**
     * @var int
     *
     * @ORM\Column(name="Distance_max_client_artisan", type="integer", nullable=false)
     */
    private $distanceMaxClientArtisan;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix_un_credit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixUnCredit;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix_abonnement", type="integer", nullable=false)
     */
    private $prixAbonnement;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix_reception_demande_abonnement", type="integer", nullable=false)
     */
    private $prixReceptionDemandeAbonnement;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix_validation_demande_abonnement", type="integer", nullable=false)
     */
    private $prixValidationDemandeAbonnement;

    public function getIdParametre(): ?int
    {
        return $this->idParametre;
    }

    public function getPeriodeGratuite(): ?string
    {
        return $this->periodeGratuite;
    }

    public function setPeriodeGratuite(string $periodeGratuite): self
    {
        $this->periodeGratuite = $periodeGratuite;

        return $this;
    }

    public function getPrixReceptionDemande(): ?int
    {
        return $this->prixReceptionDemande;
    }

    public function setPrixReceptionDemande(int $prixReceptionDemande): self
    {
        $this->prixReceptionDemande = $prixReceptionDemande;

        return $this;
    }

    public function getPrixValidationDemande(): ?int
    {
        return $this->prixValidationDemande;
    }

    public function setPrixValidationDemande(int $prixValidationDemande): self
    {
        $this->prixValidationDemande = $prixValidationDemande;

        return $this;
    }

    public function getDistanceMaxClientArtisan(): ?int
    {
        return $this->distanceMaxClientArtisan;
    }

    public function setDistanceMaxClientArtisan(int $distanceMaxClientArtisan): self
    {
        $this->distanceMaxClientArtisan = $distanceMaxClientArtisan;

        return $this;
    }

    public function getPrixUnCredit(): ?float
    {
        return $this->prixUnCredit;
    }

    public function setPrixUnCredit(float $prixUnCredit): self
    {
        $this->prixUnCredit = $prixUnCredit;

        return $this;
    }

    public function getPrixAbonnement(): ?int
    {
        return $this->prixAbonnement;
    }

    public function setPrixAbonnement(int $prixAbonnement): self
    {
        $this->prixAbonnement = $prixAbonnement;

        return $this;
    }

    public function getPrixReceptionDemandeAbonnement(): ?float
    {
        return $this->prixReceptionDemandeAbonnement;
    }

    public function setPrixReceptionDemandeAbonnement(float $PrixReceptionDemandeAbonnement): self
    {
        $this->prixReceptionDemandeAbonnement = $PrixReceptionDemandeAbonnement;

        return $this;
    }

    public function getPrixValidationDemandeAbonnement(): ?float
    {
        return $this->prixValidationDemandeAbonnement;
    }

    public function setPrixValidationDemandeAbonnement(float $PrixValidationDemandeAbonnement): self
    {
        $this->prixValidationDemandeAbonnement = $PrixValidationDemandeAbonnement;

        return $this;
    }
}