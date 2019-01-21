<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity
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
     * @ORM\Column(name="Clef", type="string", length=50, nullable=false)
     */
    private $clef;

    /**
     * @var int
     *
     * @ORM\Column(name="Valeur", type="integer", nullable=false)
     */
    private $valeur;

    public function getIdParametre(): ?int
    {
        return $this->idParametre;
    }

    public function getClef(): ?string
    {
        return $this->clef;
    }

    public function setClef(string $clef): self
    {
        $this->clef = $clef;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }


}
