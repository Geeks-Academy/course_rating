<?php

namespace App\Entity;

use App\Repository\CourseRatingStatesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRatingStatesRepository::class)
 */
class CourseRatingStates
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
    private $state;

    /**
     * @ORM\Column(type="integer")
     */
    private $course_ratings_id;

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
}
