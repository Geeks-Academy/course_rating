<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-rating-criterias", name="api_course_rating_criterias")
 */
class CourseRatingCriteriasController extends AbstractController
{
    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseRatingCriteriasList(Request $request): Response
    {
        return $this->json([
            [
                'title' => 'Some criteria',
                'code' => 'some_criteria',
            ]
        ]);
    }
}