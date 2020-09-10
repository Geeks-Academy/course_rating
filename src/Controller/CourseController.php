<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/courses", name="api_courses_")
 */
class CourseController extends AbstractController
{
    /**
    * @Route("", name="list", methods={"GET"})
    */
    public function coursesList(Request $request): Response
    {
        return $this->json([
            [
                'title' => 'Some course'
            ]
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function addCourse(Request $request): Response
    {
        return $this->json(true, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{$id}", name="edit", methods={"PUT"})
     */
    public function editCourse(Request $request, int $id)
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-technologies", name="add_course_technolog", methods={"POST"})
     */
    public function addCourseTechnology(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-technologies/{$courseTechnologyId}", name="remove_course_technology", methods={"DELETE"})
     */
    public function removeCourseTechnology(Request $request, int $id, int $courseTechnologyId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-characteristics", name="add_course_characteristic", methods={"POST"})
     */
    public function addCourseCharacteristic(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-characteristics/{$courseCharacteristicId}", name="remove_course_characteristic", methods={"DELETE"})
     */
    public function removeCourseCharacteristic(Request $request, int $id, int $courseCharacteristicId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-translations", name="add_course_translation", methods={"POST"})
     */
    public function addCourseTranslation(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{$id}/course-translations/{$courseTranslationId}", name="remove_course_translation", methods={"DELETE"})
     */
    public function removeCourseTranslation(Request $request, int $id, int $courseTranslationId): Response
    {
        return $this->json(true);
    }
}