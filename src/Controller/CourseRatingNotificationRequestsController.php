<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-rating-notification-requests", name="api_course_rating_notification_requests")
 */
class CourseRatingNotificationRequestsController extends AbstractController
{
    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function notificationRequestsList(): Response
    {
        return $this->json([
            [
                'id' => 1,
            ]
        ]);
    }

    /**
     * @Route("/{$id}", name="delete", methods={"DELETE"})
     */
    public function deleteNotification(Request $request, int $id): Response
    {
        return $this->json(true);
    }
}