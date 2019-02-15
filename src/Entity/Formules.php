<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formules
 *
 * @ORM\Table(name="formules")
 * @ORM\Entity(repositoryClass="App\Repository\FormulesRepository")
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
     * @ORM\Column(name="Nom_formule", type="string", length=100, nullable=false)
     */
    private $nomFormule;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_formule", type="string", length=100, nullable=false)
     */
    private $descriptionFormule;

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

    public function getDescriptionFormule(): ?string
    {
        return $this->descriptionFormule;
    }

    public function setDescriptionFormule(string $descriptionFormule): self
    {
        $this->descriptionFormule = $descriptionFormule;

        return $this;
    }


}
