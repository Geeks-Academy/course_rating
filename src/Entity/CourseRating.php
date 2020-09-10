<?php

namespace App\Entity;

use App\Repository\CourseRatingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRatingRepository::class)
 */
class CourseRating
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
    private $username;

    /**
     * @ORM\Column(type="smallint")
     */
    private $draft;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity=CourseRatingCriterionReference::class, mappedBy="courseRating")
     */
    private $ratingCriterionReferences;

    /**
     * @ORM\ManyToOne(targetEntity=Course::class, inversedBy="ratings")
     */
    private $course;

    /**
     * @ORM\OneToMany(targetEntity=CourseRatingNotificationRequest::class, mappedBy="courseRating")
     */
    private $notificationRequests;

    public function __construct()
    {
        $this->ratingCriterionReferences = new ArrayCollection();
        $this->notificationRequests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDraft(): ?int
    {
        return $this->draft;
    }

    public function setDraft(int $draft): self
    {
        $this->draft = $draft;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|CourseRatingCriterionReference[]
     */
    public function getRatingCriterionReferences(): Collection
    {
        return $this->ratingCriterionReferences;
    }

    public function addRatingCriterionReference(CourseRatingCriterionReference $ratingCriterionReference): self
    {
        if (!$this->ratingCriterionReferences->contains($ratingCriterionReference)) {
            $this->ratingCriterionReferences[] = $ratingCriterionReference;
            $ratingCriterionReference->setCourseRating($this);
        }

        return $this;
    }

    public function removeRatingCriterionReference(CourseRatingCriterionReference $ratingCriterionReference): self
    {
        if ($this->ratingCriterionReferences->contains($ratingCriterionReference)) {
            $this->ratingCriterionReferences->removeElement($ratingCriterionReference);
            // set the owning side to null (unless already changed)
            if ($ratingCriterionReference->getCourseRating() === $this) {
                $ratingCriterionReference->setCourseRating(null);
            }
        }

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    /**
     * @return Collection|CourseRatingNotificationRequest[]
     */
    public function getNotificationRequests(): Collection
    {
        return $this->notificationRequests;
    }

    public function addNotificationRequest(CourseRatingNotificationRequest $notificationRequest): self
    {
        if (!$this->notificationRequests->contains($notificationRequest)) {
            $this->notificationRequests[] = $notificationRequest;
            $notificationRequest->setCourseRating($this);
        }

        return $this;
    }

    public function removeNotificationRequest(CourseRatingNotificationRequest $notificationRequest): self
    {
        if ($this->notificationRequests->contains($notificationRequest)) {
            $this->notificationRequests->removeElement($notificationRequest);
            // set the owning side to null (unless already changed)
            if ($notificationRequest->getCourseRating() === $this) {
                $notificationRequest->setCourseRating(null);
            }
        }

        return $this;
    }

}
