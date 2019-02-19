<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horraire
 *
 * @ORM\Entity
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

}
