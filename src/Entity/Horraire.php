<?php

namespace App\Entity;


/**
 * Horraire
 */
class Horraire
{
    /**
     * @var bool
     */
    private $lundiMatin;

    /**
     * @var bool
     */
    private $lundiAprem;

    /**
     * @var bool
     */
    private $lundiSoir;

    /**
     * @var bool
     */
    private $mardiMatin;

    /**
     * @var bool
     */
    private $mardiAprem;

    /**
     * @var bool
     */
    private $mardiSoir;

    /**
     * @var bool
     */
    private $mercrediMatin;

    /**
     * @var bool
     */
    private $mercrediAprem;

    /**
     * @var bool
     */
    private $mercrediSoir;

    /**
     * @var bool
     */
    private $jeudiMatin;

    /**
     * @var bool
     */
    private $jeudiAprem;

    /**
     * @var bool
     */
    private $jeudiSoir;

    /**
     * @var bool
     */
    private $vendrediMatin;

    /**
     * @var bool
     */
    private $vendrediAprem;

    /**
     * @var bool
     */
    private $vendrediSoir;

    /**
     * @var bool
     */
    private $samediMatin;

    /**
     * @var bool
     */
    private $samediAprem;

    /**
     * @var bool
     */
    private $samediSoir;

    /**
     * @var bool
     */
    private $dimancheMatin;

    /**
     * @var bool
     */
    private $dimancheAprem;

    /**
     * @var bool
     */
    private $dimancheSoir;


    //Lundi 
    public function getlundiMatin(): ?bool
    {
        return $this->lundiMatin;
    }

    public function setlundiMatin(bool $lundiMatin): self
    {
        $this->lundiMatin = $lundiMatin;

        return $this;
    }

    public function getlundiAprem(): ?bool
    {
        return $this->lundiAprem;
    }

    public function setlundiAprem(bool $lundiAprem): self
    {
        $this->lundiAprem = $lundiAprem;

        return $this;
    }

    public function getlundiSoir(): ?bool
    {
        return $this->lundiSoir;
    }

    public function setlundiSoir(bool $lundiSoir): self
    {
        $this->lundiSoir = $lundiSoir;

        return $this;
    }


    //Mardi 
    public function getmardiMatin(): ?bool
    {
        return $this->mardiMatin;
    }

    public function setmardiMatin(bool $mardiMatin): self
    {
        $this->mardiMatin = $mardiMatin;

        return $this;
    }

    public function getmardiAprem(): ?bool
    {
        return $this->mardiAprem;
    }

    public function setmardiAprem(bool $mardiAprem): self
    {
        $this->mardiAprem = $mardiAprem;

        return $this;
    }

    public function getmardiSoir(): ?bool
    {
        return $this->mardiSoir;
    }

    public function setmardiSoir(bool $mardiSoir): self
    {
        $this->mardiSoir = $mardiSoir;

        return $this;
    }


    //Mercredi 
    public function getmercrediMatin(): ?bool
    {
        return $this->mercrediMatin;
    }

    public function setmercrediMatin(bool $mercrediMatin): self
    {
        $this->mercrediMatin = $mercrediMatin;

        return $this;
    }

    public function getmercrediAprem(): ?bool
    {
        return $this->mercrediAprem;
    }

    public function setmercrediAprem(bool $mercrediAprem): self
    {
        $this->mercrediAprem = $mercrediAprem;

        return $this;
    }

    public function getmercrediSoir(): ?bool
    {
        return $this->mercrediSoir;
    }

    public function setmercrediSoir(bool $mercrediSoir): self
    {
        $this->mercrediSoir = $mercrediSoir;

        return $this;
    }


    //jeudi 
    public function getjeudiMatin(): ?bool
    {
        return $this->jeudiMatin;
    }

    public function setjeudiMatin(bool $jeudiMatin): self
    {
        $this->jeudiMatin = $jeudiMatin;

        return $this;
    }

    public function getjeudiAprem(): ?bool
    {
        return $this->jeudiAprem;
    }

    public function setjeudiAprem(bool $jeudiAprem): self
    {
        $this->jeudiAprem = $jeudiAprem;

        return $this;
    }

    public function getjeudiSoir(): ?bool
    {
        return $this->jeudiSoir;
    }

    public function setjeudiSoir(bool $jeudiSoir): self
    {
        $this->jeudiSoir = $jeudiSoir;

        return $this;
    }

    //vendredi 
    public function getvendrediMatin(): ?bool
    {
        return $this->vendrediMatin;
    }

    public function setvendrediMatin(bool $vendrediMatin): self
    {
        $this->vendrediMatin = $vendrediMatin;

        return $this;
    }

    public function getvendrediAprem(): ?bool
    {
        return $this->vendrediAprem;
    }

    public function setvendrediAprem(bool $vendrediAprem): self
    {
        $this->vendrediAprem = $vendrediAprem;

        return $this;
    }

    public function getvendrediSoir(): ?bool
    {
        return $this->vendrediSoir;
    }

    public function setvendrediSoir(bool $vendrediSoir): self
    {
        $this->vendrediSoir = $vendrediSoir;

        return $this;
    }

    //samedi 
    public function getsamediMatin(): ?bool
    {
        return $this->samediMatin;
    }

    public function setsamediMatin(bool $samediMatin): self
    {
        $this->samediMatin = $samediMatin;

        return $this;
    }

    public function getsamediAprem(): ?bool
    {
        return $this->samediAprem;
    }

    public function setsamediAprem(bool $samediAprem): self
    {
        $this->samediAprem = $samediAprem;

        return $this;
    }

    public function getsamediSoir(): ?bool
    {
        return $this->samediSoir;
    }

    public function setsamediSoir(bool $samediSoir): self
    {
        $this->samediSoir = $samediSoir;

        return $this;
    }


    //dimanche 
    public function getdimancheMatin(): ?bool
    {
        return $this->dimancheMatin;
    }

    public function setdimancheMatin(bool $dimancheMatin): self
    {
        $this->dimancheMatin = $dimancheMatin;

        return $this;
    }

    public function getdimancheAprem(): ?bool
    {
        return $this->dimancheAprem;
    }

    public function setdimancheAprem(bool $dimancheAprem): self
    {
        $this->dimancheAprem = $dimancheAprem;

        return $this;
    }

    public function getdimancheSoir(): ?bool
    {
        return $this->dimancheSoir;
    }

    public function setdimancheSoir(bool $dimancheSoir): self
    {
        $this->dimancheSoir = $dimancheSoir;

        return $this;
    }

} 
