<?php

namespace App\Entity;

use App\Repository\StartupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StartupRepository::class)]
class Startup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $Contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getContact(): ?int
    {
        return $this->Contact;
    }

    public function setContact(int $Contact): static
    {
        $this->Contact = $Contact;

        return $this;
    }
}
