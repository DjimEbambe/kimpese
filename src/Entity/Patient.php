<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $middlemane;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $diagnotic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $traitement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sex;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lit;

    /**
     * @ORM\ManyToOne(targetEntity=Locale::class, inversedBy="patients")
     */
    private $locale;

    public function __toString()
    {
        return $this->name;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMiddlemane(): ?string
    {
        return $this->middlemane;
    }

    public function setMiddlemane(string $middlemane): self
    {
        $this->middlemane = $middlemane;

        return $this;
    }


    public function getDiagnotic(): ?string
    {
        return $this->diagnotic;
    }

    public function setDiagnotic(?string $diagnotic): self
    {
        $this->diagnotic = $diagnotic;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getDateAdmin(): ?\DateTimeInterface
    {
        return $this->dateAdmin;
    }

    public function setDateAdmin(?\DateTimeInterface $dateAdmin): self
    {
        $this->dateAdmin = $dateAdmin;

        return $this;
    }

    public function getLit(): ?string
    {
        return $this->lit;
    }

    public function setLit(string $lit): self
    {
        $this->lit = $lit;

        return $this;
    }

    public function getLocale(): ?Locale
    {
        return $this->locale;
    }

    public function setLocale(?Locale $locale): self
    {
        $this->locale = $locale;

        return $this;
    }
}
