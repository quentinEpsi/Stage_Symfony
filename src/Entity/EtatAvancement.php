<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatAvancement
 *
 * @ORM\Table(name="etat_avancement")
 * @ORM\Entity
 */
class EtatAvancement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_etat_avancement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtatAvancement;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_etat_avancement", type="string", length=40, nullable=false)
     */
    private $nomEtatAvancement;

    public function getIdEtatAvancement(): ?int
    {
        return $this->idEtatAvancement;
    }

    public function getNomEtatAvancement(): ?string
    {
        return $this->nomEtatAvancement;
    }

    public function setNomEtatAvancement(string $nomEtatAvancement): self
    {
        $this->nomEtatAvancement = $nomEtatAvancement;

        return $this;
    }


}
