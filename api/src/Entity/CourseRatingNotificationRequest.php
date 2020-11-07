<?php

namespace App\Entity;

use App\Repository\CourseRatingNotificationRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Object(repositoryClass=CourseRatingNotificationRequestRepository::class)
 */
class CourseRatingNotificationRequest
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
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $answered_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=CourseRating::class, inversedBy="notificationRequests")
     */
    private $courseRating;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAnsweredAt(): ?\DateTimeInterface
    {
        return $this->answered_at;
    }

    public function setAnsweredAt(?\DateTimeInterface $answered_at): self
    {
        $this->answered_at = $answered_at;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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
