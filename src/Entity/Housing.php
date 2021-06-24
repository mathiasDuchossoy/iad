<?php

namespace App\Entity;

use App\Repository\HousingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=HousingRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"house" = "House", "apartment" = "Apartment"})
 */
abstract class Housing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "write"})
     */
    protected ?Address $address;

    /**
     * @ORM\ManyToOne(targetEntity=Prospect::class, inversedBy="housings")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Prospect $prospect;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getProspect(): ?Prospect
    {
        return $this->prospect;
    }

    public function setProspect(?Prospect $prospect): self
    {
        $this->prospect = $prospect;

        return $this;
    }
}
