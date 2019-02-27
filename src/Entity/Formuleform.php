<?php

namespace App\Entity;



class Formuleform
{
    /**
     * @var bool
     */
    private $Formulegratuite;

    /**
     * @var bool
     */
    private $Formuleespritlibre;

    /**
     * @var bool
     */
    private $Formuleabonnement;

    public function getFormulegratuite(): ?bool
    {
        return $this->Formulegratuite;
    }

    public function setFormulegratuite(?bool $Formulegratuite): self
    {
        $this->Formulegratuite = $Formulegratuite;

        return $this;
    }

    public function getFormuleespritlibre(): ?bool
    {
        return $this->Formuleespritlibre;
    }

    public function setFormuleespritlibre(?bool $Formuleespritlibre): self
    {
        $this->Formuleespritlibre = $Formuleespritlibre;

        return $this;
    }

    public function getFormuleabonnement(): ?bool
    {
        return $this->Formuleabonnement;
    }

    public function setFormuleabonnement(?bool $Formuleabonnement): self
    {
        $this->Formuleabonnement = $Formuleabonnement;

        return $this;
    }
}
