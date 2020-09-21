<?php


namespace App\Controller;


use App\Repository\CourseCharacteristicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-characteristics", name="api_course_characteristics_")
 */
class CourseCharacteristicsController extends AbstractController
{
    private $courseCharacteristicRepository;

    public function __construct(CourseCharacteristicRepository $courseCharacteristicRepository)
    {
        $this->courseCharacteristicRepository = $courseCharacteristicRepository;
    }

    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseCharacteristicsList(Request $request): Response
    {
        $courseCharacteristics = $this->courseCharacteristicRepository->findCourseCharacteristics();
        return $this->json([
            'ok' => true,
            'payload' => $courseCharacteristics,
        ]);
    }
}