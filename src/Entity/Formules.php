<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formules
 *
 * @ORM\Table(name="formules")
 * @ORM\Entity
 */
class Formules
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_formule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormule;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_formule", type="string", length=50, nullable=false)
     */
    private $nomFormule;

    /**
     * @var string
     *
     * @ORM\Column(name="Montant_paiement", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $montantPaiement;

    public function getIdFormule(): ?int
    {
        return $this->idFormule;
    }

    public function getNomFormule(): ?string
    {
        return $this->nomFormule;
    }

    public function setNomFormule(string $nomFormule): self
    {
        $this->nomFormule = $nomFormule;

        return $this;
    }

    public function getMontantPaiement()
    {
        return $this->montantPaiement;
    }

    public function setMontantPaiement($montantPaiement): self
    {
        $this->montantPaiement = $montantPaiement;

        return $this;
    }


}
