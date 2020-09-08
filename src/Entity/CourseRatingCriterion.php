<?php

namespace App\Entity;

use App\Repository\CourseRatingCriterionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRatingCriterionRepository::class)
 */
class CourseRatingCriterion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=CourseRatingCriterionReference::class, mappedBy="courseRatingCriterion")
     */
    private $ratingReferences;

    public function __construct()
    {
        $this->ratingReferences = new ArrayCollection();
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

    /**
     * @return Collection|CourseRatingCriterionReference[]
     */
    public function getRatingReferences(): Collection
    {
        return $this->ratingReferences;
    }

    public function addRatingReference(CourseRatingCriterionReference $ratingReference): self
    {
        if (!$this->ratingReferences->contains($ratingReference)) {
            $this->ratingReferences[] = $ratingReference;
            $ratingReference->setCourseRatingCriterion($this);
        }

        return $this;
    }

    public function removeRatingReference(CourseRatingCriterionReference $ratingReference): self
    {
        if ($this->ratingReferences->contains($ratingReference)) {
            $this->ratingReferences->removeElement($ratingReference);
            // set the owning side to null (unless already changed)
            if ($ratingReference->getCourseRatingCriterion() === $this) {
                $ratingReference->setCourseRatingCriterion(null);
            }
        }

        return $this;
    }

}
