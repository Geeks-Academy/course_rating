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

    /**
     * @ORM\OneToMany(targetEntity=UserVotes::class, mappedBy="courseRating")
     */
    private $userVotes;

    /**
     * @ORM\OneToMany(targetEntity=CourseRatingState::class, mappedBy="courseRating")
     */
    private $ratingStates;

    /**
     * @ORM\OneToMany(targetEntity=UserRating::class, mappedBy="courseRating")
     */
    private $userRatings;

    public function __construct()
    {
        $this->ratingCriterionReferences = new ArrayCollection();
        $this->notificationRequests = new ArrayCollection();
        $this->userVotes = new ArrayCollection();
        $this->ratingStates = new ArrayCollection();
        $this->userRatings = new ArrayCollection();
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

    /**
     * @return Collection|UserVotes[]
     */
    public function getUserVotes(): Collection
    {
        return $this->userVotes;
    }

    public function addUserVote(UserVotes $userVote): self
    {
        if (!$this->userVotes->contains($userVote)) {
            $this->userVotes[] = $userVote;
            $userVote->setCourseRating($this);
        }

        return $this;
    }
    /**
     * @return Collection|UserRating[]
     */
    public function getUserRatings(): Collection
    {
        return $this->userRatings;
    }

    public function addUserRating(UserRating $userRating): self
    {
        if (!$this->userRatings->contains($userRating)) {
            $this->userRatings[] = $userRating;
            $userRating->setCourseRating($this);
        }

        return $this;
    }

    public function removeUserVote(UserVotes $userVote): self
    {
        if ($this->userVotes->contains($userVote)) {
            $this->userVotes->removeElement($userVote);
            // set the owning side to null (unless already changed)
            if ($userVote->getCourseRating() === $this) {
                $userVote->setCourseRating(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CourseRatingState[]
     */
    public function getRatingStates(): Collection
    {
        return $this->ratingStates;
    }

    public function addRatingState(CourseRatingState $ratingState): self
    {
        if (!$this->ratingStates->contains($ratingState)) {
            $this->ratingStates[] = $ratingState;
            $ratingState->setCourseRating($this);
        }

        return $this;
    }

    public function removeRatingState(CourseRatingState $ratingState): self
    {
        if ($this->ratingStates->contains($ratingState)) {
            $this->ratingStates->removeElement($ratingState);
            // set the owning side to null (unless already changed)
            if ($ratingState->getCourseRating() === $this) {
                $ratingState->setCourseRating(null);
            }
        }

        return $this;
    }

    public function removeUserRating(UserRating $userRating): self
    {
        if ($this->userRatings->contains($userRating)) {
            $this->userRatings->removeElement($userRating);
            // set the owning side to null (unless already changed)
            if ($userRating->getCourseRating() === $this) {
                $userRating->setCourseRating(null);
            }
        }

        return $this;
    }

}
