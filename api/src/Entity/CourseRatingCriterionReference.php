<?php

namespace App\Entity;

use App\Repository\CourseRatingCriterionReferenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Object(repositoryClass=CourseRatingCriterionReferenceRepository::class)
 */
class CourseRatingCriterionReference
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
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity=CourseRating::class, inversedBy="ratingCriterionReferences")
     */
    private $courseRating;

    /**
     * @ORM\ManyToOne(targetEntity=CourseRatingCriterion::class, inversedBy="ratingReferences")
     */
    private $courseRatingCriterion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(string $rating): self
    {
        $this->rating = $rating;

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

    public function getCourseRatingCriterion(): ?CourseRatingCriterion
    {
        return $this->courseRatingCriterion;
    }

    public function setCourseRatingCriterion(?CourseRatingCriterion $courseRatingCriterion): self
    {
        $this->courseRatingCriterion = $courseRatingCriterion;

        return $this;
    }
}
