<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course implements \JsonSerializable
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

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $author;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $release_date;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $repository_url;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isReviewed;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRepositoryUrl(): ?string
    {
        return $this->repository_url;
    }

    public function setRepositoryUrl(string $repository_url): self
    {
        $this->repository_url = $repository_url;

        return $this;
    }

    public function getIsReviewed(): ?bool
    {
        return $this->isReviewed;
    }

    public function setIsReviewed(bool $isReviewed): self
    {
        $this->isReviewed = $isReviewed;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'name' => $this->name,
            'url' => $this->url,
            'release_date' => $this->release_date,
            'duration' => $this->duration,
            'language' => $this->language,
            'isReviewed' => $this->isReviewed,
            'repository_url' => $this->repository_url,
            'price' => $this->price,
        ];
    }

    public function getData()
    {
        return $this->jsonSerialize();
    }
}
