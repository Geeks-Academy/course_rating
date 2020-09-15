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
    private $course_rating_id;

    /**
     * @ORM\ManyToOne(targetEntity=CourseRating::class, inversedBy="ratingStates")
     */
    private $courseRating;

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

    public function getCourseRatingId(): ?int
    {
        return $this->course_rating_id;
    }

    public function setCourseRatingId(int $course_rating_id): self
    {
        $this->course_rating_id = $course_rating_id;

        return $this;
    }

    public function getCourseRating(): ?CourseRating
    {
        return $this->courseRating;
    }

    public function setCourseRating(?CourseRating $courseRating): self
    {
        $this->courseRating = $courseRating;

        return $this;
    }

}
