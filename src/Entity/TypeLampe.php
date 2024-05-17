<?php

namespace App\Entity;

use App\Repository\TypeLampeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeLampeRepository::class)]
class TypeLampe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Lampe>
     */
    #[ORM\OneToMany(targetEntity: Lampe::class, mappedBy: 'typeLampe')]
    private Collection $lampes;

    public function __construct()
    {
        $this->lampes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Lampe>
     */
    public function getLampes(): Collection
    {
        return $this->lampes;
    }

    public function addLampe(Lampe $lampe): static
    {
        if (!$this->lampes->contains($lampe)) {
            $this->lampes->add($lampe);
            $lampe->setTypeLampe($this);
        }

        return $this;
    }

    public function removeLampe(Lampe $lampe): static
    {
        if ($this->lampes->removeElement($lampe)) {
            // set the owning side to null (unless already changed)
            if ($lampe->getTypeLampe() === $this) {
                $lampe->setTypeLampe(null);
            }
        }

        return $this;
    }

    


}
