<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-characteristics", name="api_course_characteristics_")
 */
class CourseCharacteristicsController extends AbstractController
{
    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseCharacteristicsList(Request $request): Response
    {
        return $this->json([
            [
                'title' => 'Free',
                'code' => 'free',
                'counterpart' => [
                    'title' => 'Paid',
                    'code' => 'paid',
                ],
            ]
        ]);
    }
}