<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReinitialisationMdp
 *
 * @ORM\Table(name="reinitialisation_mdp", uniqueConstraints={@ORM\UniqueConstraint(name="reinitialisation_mdp_artisan_AK", columns={"Id_artisan"})})
 * @ORM\Entity
 */
class ReinitialisationMdp
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_reinitialisation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReinitialisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Token", type="string", length=21, nullable=false)
     */
    private $token;

    /**
     * @var \Artisan
     *
     * @ORM\ManyToOne(targetEntity="Artisan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_artisan", referencedColumnName="Id_artisan")
     * })
     */
    private $idArtisan;

    public function getIdReinitialisation(): ?int
    {
        return $this->idReinitialisation;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getIdArtisan(): ?Artisan
    {
        return $this->idArtisan;
    }

    public function setIdArtisan(?Artisan $idArtisan): self
    {
        $this->idArtisan = $idArtisan;

        return $this;
    }


}
