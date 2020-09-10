<?php

namespace App\Entity;

use App\Repository\UserRatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRatingRepository::class)
 */
class UserRating
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
     * @ORM\Column(type="string", length=45)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity=CourseRating::class, inversedBy="userRatings")
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

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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
