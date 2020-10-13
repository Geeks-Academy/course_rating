<?php


namespace App\Controller;


use App\Entity\Course;
use App\Entity\CourseLevel;
use App\Repository\CourseLevelRepository;
use App\Services\Course\Level\Endpoint\Mapper\UserMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course/levels", name="api_course_levels_")
 */
class CourseLevelController extends AbstractController
{
    private CourseLevelRepository $courseLevelRepository;

    public function __construct(CourseLevelRepository $courseLevelRepository)
    {
        $this->courseLevelRepository = $courseLevelRepository;
    }

    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseCharacteristicsList(): Response
    {
        $levels = $this->courseLevelRepository->findAll();

        return $this->json(
            array_map(fn(CourseLevel $level) => (new UserMapper($level))->toEndpointFormat(), $levels)
        );
    }
}