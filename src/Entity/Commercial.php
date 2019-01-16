<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commercial
 *
 * @ORM\Table(name="commercial")
 * @ORM\Entity
 */
class Commercial
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_commercial", type="string", length=100, nullable=false)
     */
    private $mailCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="Motdepasse_commercial", type="string", length=100, nullable=false)
     */
    private $motdepasseCommercial;

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }

    public function getMailCommercial(): ?string
    {
        return $this->mailCommercial;
    }

    public function setMailCommercial(string $mailCommercial): self
    {
        $this->mailCommercial = $mailCommercial;

        return $this;
    }

    public function getMotdepasseCommercial(): ?string
    {
        return $this->motdepasseCommercial;
    }

    public function setMotdepasseCommercial(string $motdepasseCommercial): self
    {
        $this->motdepasseCommercial = $motdepasseCommercial;

        return $this;
    }


}
