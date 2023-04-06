<?php

namespace App\Entity;

use App\Repository\AssMAtRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssMAtRepository::class)]
class AssMAt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $securite_sociale = null;

    #[ORM\Column(nullable: true)]
    private ?int $paje_emploi = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_agrement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_agrement = null;

    #[ORM\Column]
    private ?bool $isAdmin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSecuriteSociale(): ?int
    {
        return $this->securite_sociale;
    }

    public function setSecuriteSociale(?int $securite_sociale): self
    {
        $this->securite_sociale = $securite_sociale;

        return $this;
    }

    public function getPajeEmploi(): ?int
    {
        return $this->paje_emploi;
    }

    public function setPajeEmploi(?int $paje_emploi): self
    {
        $this->paje_emploi = $paje_emploi;

        return $this;
    }

    public function getNumeroAgrement(): ?int
    {
        return $this->numero_agrement;
    }

    public function setNumeroAgrement(?int $numero_agrement): self
    {
        $this->numero_agrement = $numero_agrement;

        return $this;
    }

    public function getDateFinAgrement(): ?\DateTimeInterface
    {
        return $this->date_fin_agrement;
    }

    public function setDateFinAgrement(?\DateTimeInterface $date_fin_agrement): self
    {
        $this->date_fin_agrement = $date_fin_agrement;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
}
