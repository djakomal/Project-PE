<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise extends Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $NomEntreprise = null;

    #[ORM\Column(length: 100)]
    private ?string $Email = null;

    #[ORM\Column(length: 70)]
    private ?string $Addresse = null;

    #[ORM\Column(length: 100)]
    private ?string $TypeService = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(length: 100)]
    private ?string $SituationGeographique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->NomEntreprise;
    }

    public function setNomEntreprise(string $NomEntreprise): static
    {
        $this->NomEntreprise = $NomEntreprise;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->Addresse;
    }

    public function setAddresse(string $Addresse): static
    {
        $this->Addresse = $Addresse;

        return $this;
    }

    public function getTypeService(): ?string
    {
        return $this->TypeService;
    }

    public function setTypeService(string $TypeService): static
    {
        $this->TypeService = $TypeService;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getSituationGeographique(): ?string
    {
        return $this->SituationGeographique;
    }

    public function setSituationGeographique(string $SituationGeographique): static
    {
        $this->SituationGeographique = $SituationGeographique;

        return $this;
    }
}
