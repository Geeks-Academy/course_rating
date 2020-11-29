<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "update"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "update"})
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity=CourseCharacteristic::class, inversedBy="courses")
     * @Groups({"get_characteristics"})
     */
    private $characteristics;

    /**
     * @ORM\ManyToMany(targetEntity=CourseTranslation::class, inversedBy="courses")
     * @Groups({"get_translations"})
     */
    private $translations;

    /**
     * @ORM\ManyToMany(targetEntity=CourseTechnology::class, inversedBy="courses")
     * @Groups({"get_technologies"})
     */
    private $technologies;

    /**
     * @ORM\OneToMany(targetEntity=CourseRating::class, mappedBy="course")
     * @Groups({"get_ratings"})
     */
    private $ratings;

    /**
     * @ORM\OneToMany(targetEntity=CourseSource::class, mappedBy="course")
     * @Groups({"get_sources"})
     */
    private $sources;

    /**
     * @ORM\Column(type="string", length=45)
     * @Groups({"get", "update"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=45)
     * @Groups({"get", "update"})
     */
    private $author;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"get", "update"})
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Groups({"get", "update"})
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Groups({"get", "update"})
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Groups({"get", "update"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"get", "update"})
     */
    private $repositoryUrl;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"get"})
     */
    private $isReviewed;

    /**
     * @ORM\ManyToMany(targetEntity=CourseCategory::class, inversedBy="courses")
     * @Groups({"get_categories"})
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=CourseLevel::class, inversedBy="courses")
     * @Groups({"get_level"})
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity=CourseArea::class, mappedBy="courses")
     * @Groups({"get_areas"})
     */
    private $areas;

    public function __construct()
    {
        $this->characteristics = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->technologies = new ArrayCollection();
        $this->ratings = new ArrayCollection();
        $this->sources = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->areas = new ArrayCollection();
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
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

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
        return $this->repositoryUrl;
    }

    public function setRepositoryUrl(string $repositoryUrl): self
    {
        $this->repositoryUrl = $repositoryUrl;

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

    /**
     * @return Collection|CourseCategory[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(CourseCategory $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(CourseCategory $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    public function getLevel(): ?CourseLevel
    {
        return $this->level;
    }

    public function setLevel(?CourseLevel $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|CourseArea[]
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(CourseArea $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas[] = $area;
            $area->addCourse($this);
        }

        return $this;
    }

    public function removeArea(CourseArea $area): self
    {
        if ($this->areas->contains($area)) {
            $this->areas->removeElement($area);
            $area->removeCourse($this);
        }

        return $this;
    }
}
