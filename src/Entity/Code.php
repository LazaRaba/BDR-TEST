<?php

namespace App\Entity;

use App\Repository\CodeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodeRepository::class)]
class Code
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $valeur_code = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurCode(): ?string
    {
        return $this->valeur_code;
    }

    public function setValeurCode(?string $valeur_code): self
    {
        $this->valeur_code = $valeur_code;

        return $this;
    }
}
