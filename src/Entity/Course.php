<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
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
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity=CourseCharacteristic::class, inversedBy="courses")
     */
    private $characteristics;

    /**
     * @ORM\ManyToMany(targetEntity=CourseTranslation::class, inversedBy="courses")
     */
    private $translations;

    /**
     * @ORM\ManyToMany(targetEntity=CourseTechnology::class, inversedBy="courses")
     */
    private $technologies;

    /**
     * @ORM\OneToMany(targetEntity=CourseRating::class, mappedBy="course")
     */
    private $ratings;

    /**
     * @ORM\OneToMany(targetEntity=CourseSource::class, mappedBy="course")
     */
    private $sources;

    public function __construct()
    {
        $this->characteristics = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->technologies = new ArrayCollection();
        $this->ratings = new ArrayCollection();
        $this->sources = new ArrayCollection();
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|CourseCharacteristic[]
     */
    public function getCharacteristics(): Collection
    {
        return $this->characteristics;
    }

    public function addCharacteristic(CourseCharacteristic $characteristic): self
    {
        if (!$this->characteristics->contains($characteristic)) {
            $this->characteristics[] = $characteristic;
        }

        return $this;
    }

    public function removeCharacteristic(CourseCharacteristic $characteristic): self
    {
        if ($this->characteristics->contains($characteristic)) {
            $this->characteristics->removeElement($characteristic);
        }

        return $this;
    }

    /**
     * @return Collection|CourseTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CourseTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
        }

        return $this;
    }

    /**
     * @return Collection|CourseTechnology[]
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(CourseTechnology $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies[] = $technology;
        }

        return $this;
    }

    public function removeTranslation(CourseTranslation $translation): self
    {
        if ($this->translations->contains($translation)) {
            $this->translations->removeElement($translation);
        }

        return $this;
    }

    public function removeTechnology(CourseTechnology $technology): self
    {
        if ($this->technologies->contains($technology)) {
            $this->technologies->removeElement($technology);
        }

        return $this;
    }

    /**
     * @return Collection|CourseRating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(CourseRating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setCourse($this);
        }

        return $this;
    }

    public function removeRating(CourseRating $rating): self
    {
        if ($this->ratings->contains($rating)) {
            $this->ratings->removeElement($rating);
            // set the owning side to null (unless already changed)
            if ($rating->getCourse() === $this) {
                $rating->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CourseSource[]
     */
    public function getSources(): Collection
    {
        return $this->sources;
    }

    public function addSource(CourseSource $source): self
    {
        if (!$this->sources->contains($source)) {
            $this->sources[] = $source;
            $source->setCourse($this);
        }

        return $this;
    }

    public function removeSource(CourseSource $source): self
    {
        if ($this->sources->contains($source)) {
            $this->sources->removeElement($source);
            // set the owning side to null (unless already changed)
            if ($source->getCourse() === $this) {
                $source->setCourse(null);
            }
        }

        return $this;
    }
}
