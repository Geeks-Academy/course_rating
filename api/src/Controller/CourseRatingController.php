<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-ratings", name="api_course_ratings_")
 */
class CourseRatingController extends AbstractController
{
    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseRatingsList(Request $request): Response
    {
        return $this->json([
            [
                'username' => 'john.doe',
                'score' => 100,
            ]
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function addCourseRating(Request $request): Response
    {
        return $this->json(true, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{$id}", name="edit", methods={"PUT"})
     */
    public function editCourseRating(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}", name="remove", methods={"DELETE"})
     */
    public function removeCourseRating(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/user-ratings", name="user_ratings_list", methods={"GET"})
     */
    public function userRatingsList(Request $request, int $id): Response
    {
        return $this->json([
            [
                'username' => 'psmith123',
                'weight' => 20,
                'rating' => 100,
                'comment' => 'Very accurate course rating!'
            ]
        ]);
    }

    /**
     * @Route("/{$id}/user-ratings", name="add_user_rating", methods={"POST"})
     */
    public function addUserRating(Request $request, int $id): Response
    {
        return $this->json(true, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{$id}/user-ratings/{$userRatingId}", name="edit_user_rating", methods={"PUT"})
     */
    public function editUserRating(Request $request, int $id, int $userRatingId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/user-ratings/{$userRatingId}", name="remove_user_rating", methods={"DELETE"})
     */
    public function removeUserRating(Request $request, int $id, int $userRatingId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/user-votes", name="user_votes_list", methods={"GET"})
     */
    public function userVotesList(Request $request, int $id): Response
    {
        return $this->json([
            [
                'username' => 'john.doe',
                'vote' => 'UP',
                'reason' => 'Very accurate rating, nothing else to add!',
            ]
        ]);
    }

    /**
     * @Route("/{$id}/user-votes/{$userVoteId}", name="edit_user_vote", methods={"PUT"})
     */
    public function editUserVote(Request $request, int $id, int $userVoteId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/user-votes/{$userVoteId}", name="remove_user_vote", methods={"DELETE"})
     */
    public function removeUserVote(Request $request, int $id, int $userVoteId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/upvote", name="upvote", methods={"POST"})
     */
    public function upvote(Request $request, int $id): Response
    {
        return $this->json(true, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{$id}/downvote", name="downvote", methods={"POST"})
     */
    public function downvote(Request $request, int $id): Response
    {
        return $this->json(true, Response::HTTP_CREATED);
    }
}