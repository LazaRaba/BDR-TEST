<?php

namespace App\Entity;

use App\Repository\AssMatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssMatRepository::class)]
class AssMat
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

    // #[ORM\OneToMany(mappedBy: 'AssMat', targetEntity: User::class)]
    // private Collection $users;

    public function __construct()
    {
        $this->code = new ArrayCollection();
        // $this->users = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Code>
     */
    public function getCode(): Collection
    {
        return $this->code;
    }

    public function addCode(Code $code): self
    {
        if (!$this->code->contains($code)) {
            $this->code->add($code);
            $code->setIdAssMat($this);
        }

        return $this;
    }

    public function removeCode(Code $code): self
    {
        if ($this->code->removeElement($code)) {
            // set the owning side to null (unless already changed)
            if ($code->getIdAssMat() === $this) {
                $code->setIdAssMat(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection<int, User>
    //  */
    // public function getUsers(): Collection
    // {
    //     return $this->users;
    // }

    // public function addUser(User $user): self
    // {
    //     if (!$this->users->contains($user)) {
    //         $this->users->add($user);
    //         $user->setAssMat($this);
    //     }

    //     return $this;
    // }

    // public function removeUser(User $user): self
    // {
    //     if ($this->users->removeElement($user)) {
    //         // set the owning side to null (unless already changed)
    //         if ($user->getAssMat() === $this) {
    //             $user->setAssMat(null);
    //         }
    //     }

    //     return $this;
    // }
}
