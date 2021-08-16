<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $size;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $cond;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $felni;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $decor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $phone;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getCond()
    {
        return $this->cond;
    }

    public function setCond($cond)
    {
        $this->cond = $cond;
    }

    public function getFelni(): ?string
    {
        return $this->felni;
    }

    public function setFelni(?string $felni): self
    {
        $this->felni = $felni;

        return $this;
    }

    public function getDecor(): ?string
    {
        return $this->decor;
    }

    public function setDecor(?string $decor): self
    {
        $this->decor = $decor;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

}
