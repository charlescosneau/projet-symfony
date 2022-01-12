<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $immobilier;

    #[ORM\Column(type: 'string', length: 255)]
    private $mode;

    #[ORM\Column(type: 'string', length: 255)]
    private $vehicule;

    #[ORM\Column(type: 'string', length: 255)]
    private $maison;

    #[ORM\Column(type: 'string', length: 255)]
    private $loisirs;

    #[ORM\Column(type: 'string', length: 255)]
    private $divers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmobilier(): ?string
    {
        return $this->immobilier;
    }

    public function setImmobilier(string $immobilier): self
    {
        $this->immobilier = $immobilier;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(string $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getMaison(): ?string
    {
        return $this->maison;
    }

    public function setMaison(string $maison): self
    {
        $this->maison = $maison;

        return $this;
    }

    public function getLoisirs(): ?string
    {
        return $this->loisirs;
    }

    public function setLoisirs(string $loisirs): self
    {
        $this->loisirs = $loisirs;

        return $this;
    }

    public function getDivers(): ?string
    {
        return $this->divers;
    }

    public function setDivers(string $divers): self
    {
        $this->divers = $divers;

        return $this;
    }
}
