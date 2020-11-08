<?php

namespace App\Entity;

use App\Repository\CourseCharacteristicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseCharacteristicRepository::class)
 */
class CourseCharacteristic implements \JsonSerializable
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
    private $title;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEnabled;

    /**
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="characteristics")
     */
    private $courses;

    /**
     * @ORM\OneToOne(targetEntity=CourseCharacteristic::class, cascade={"persist"})
     * @ORM\JoinColumn(name="counterpart_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $counterpart;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->isEnabled = false;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getIsEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

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
            $course->addCharacteristic($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            $course->removeCharacteristic($this);
        }

        return $this;
    }

    public function getCounterpart(): ?CourseCharacteristic
    {
        return $this->counterpart;
    }

    public function setCounterpart($counterpart): self
    {
        // 2 way bind of the counterpart
        if ($counterpart) {
            if ($this->counterpart) {
                $this->counterpart->counterpart = null;
            }
            $counterpart->counterpart = $this;
        }

        // unlink on the other side when $counterpart is null
        if ($this->counterpart && !$counterpart) {
            $this->counterpart->counterpart = null;
        }

        $this->counterpart = $counterpart;
        return $this;
    }

    public function jsonSerialize()
    {
        $payload = [
            'id' => $this->id,
            'title' => $this->title,
            'code' => $this->code,
        ];

        if ($this->counterpart) {
            $payload['counterpart'] = [
                'id' => $this->counterpart->id,
                'title' => $this->counterpart->title,
                'code' => $this->counterpart->code,
            ];
        } else {
            $payload['counterpart'] = null;
        }

        return $payload;
    }
}
