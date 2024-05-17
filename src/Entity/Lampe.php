<?php

namespace App\Entity;

use App\Repository\LampeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LampeRepository::class)]
class Lampe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'lampes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeLampe $typeLampe = null;

    /**
     * @var Collection<int, Ajouter>
     */
    #[ORM\OneToMany(targetEntity: Ajouter::class, mappedBy: 'lampe', orphanRemoval: true)]
    private Collection $ajouter;

    public function __construct()
    {
        $this->ajouter = new ArrayCollection();
    }


   
    

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getTypeLampe(): ?TypeLampe
    {
        return $this->typeLampe;
    }

    public function setTypeLampe(?TypeLampe $typeLampe): static
    {
        $this->typeLampe = $typeLampe;

        return $this;
    }

    /**
     * @return Collection<int, Ajouter>
     */
    public function getAjouter(): Collection
    {
        return $this->ajouter;
    }

    public function addAjouter(Ajouter $ajouter): static
    {
        if (!$this->ajouter->contains($ajouter)) {
            $this->ajouter->add($ajouter);
            $ajouter->setLampe($this);
        }

        return $this;
    }

    public function removeAjouter(Ajouter $ajouter): static
    {
        if ($this->ajouter->removeElement($ajouter)) {
            // set the owning side to null (unless already changed)
            if ($ajouter->getLampe() === $this) {
                $ajouter->setLampe(null);
            }
        }

        return $this;
    }

    

   
    

}
