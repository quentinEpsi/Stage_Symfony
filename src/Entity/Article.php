<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo_article", type="string", length=100, nullable=false)
     */
    private $photoArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_formule", type="string", length=200, nullable=false)
     */
    private $descriptionFormule;

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function getPhotoArticle(): ?string
    {
        return $this->photoArticle;
    }

    public function setPhotoArticle(string $photoArticle): self
    {
        $this->photoArticle = $photoArticle;

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
