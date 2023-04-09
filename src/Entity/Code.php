<?php

namespace App\Entity;

use App\Repository\CodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodeRepository::class)]
class Code
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $valeur_code = null;

    #[ORM\ManyToOne(inversedBy: 'code')]
    private ?AssMat $id_assmat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurCode(): ?string
    {
        return $this->valeur_code;
    }

    public function setValeurCode(string $valeur_code): self
    {
        $this->valeur_code = $valeur_code;

        return $this;
    }

    public function getIdAssmat(): ?AssMat
    {
        return $this->id_assmat;
    }

    public function setIdAssmat(?AssMat $id_assmat): self
    {
        $this->id_assmat = $id_assmat;

        return $this;
    }
}
