<?php

namespace App\Entity;

use App\Repository\CourseTechnologyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CourseTechnologyRepository::class)
 */
class CourseTechnology
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"get", "update"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Groups({"get", "update"})
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=45)
     * @Groups({"get", "update"})
     */
    private $code;

    /**
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="technologies")
     * @Groups({"get_courses"})
     */
    private $courses;

    /**
     * @ORM\ManyToMany(targetEntity=CourseArea::class, mappedBy="technologies")
     * @Groups({"get_areas"})
     */
    private $areas;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->areas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addTechnology($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            $course->removeTechnology($this);
        }

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
            $area->addTechnology($this);
        }

        return $this;
    }

    public function removeArea(CourseArea $area): self
    {
        if ($this->areas->contains($area)) {
            $this->areas->removeElement($area);
            $area->removeTechnology($this);
        }

        return $this;
    }
}
