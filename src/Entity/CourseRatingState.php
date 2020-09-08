<?php

namespace App\Entity;

use App\Repository\CourseRatingStateRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRatingStateRepository::class)
 */
class CourseRatingState
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $state;

    /**
     * @ORM\Column(type="integer")
     */
    private $course_ratings_id;

    /**
     * @ORM\ManyToMany(targetEntity=CourseRating::class, mappedBy="courses_id")
     */
    private $course_ratings;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCourseRatingsId(): ?int
    {
        return $this->course_ratings_id;
    }

    public function setCourseRatingsId(int $course_ratings_id): self
    {
        $this->course_ratings_id = $course_ratings_id;

        return $this;
    }

    /**
     * @return Collection|CourseRating[]
     */
    public function getCoursesRatings(): Collection
    {
        return $this->course_ratings;
    }

    public function addCourseRating(CourseRating $courseRating): self
    {
        if (!$this->course_ratings->contains($courseRating)) {
            $this->course_ratings[] = $courseRating;
            $courseRating->addCourseRating($this);
        }

        return $this;
    }

    public function removeCourseRating(CourseRating $courseRating): self
    {
        if ($this->courseRating->contains($courseRating)) {
            $this->courseRating->removeElement($courseRating);
            $courseRating->removeCourseRating($this);
        }

        return $this;
    }
}
