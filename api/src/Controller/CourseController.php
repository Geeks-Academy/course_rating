<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use App\Services\Course\CourseBuilder;
use App\Services\Course\DataMapper;
use App\Services\Course\CourseUpdater;
use App\Services\Validation\ValidationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/courses", name="api_courses_")
 */
class CourseController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private CourseRepository $courseRepository;
    private CourseBuilder $courseBuilder;
    private CourseUpdater $courseUpdater;

    /**
     * CourseController constructor.
     *
     * @param CourseRepository $courseRepository
     * @param CourseBuilder $courseBuilder
     * @param CourseUpdater $courseUpdater
     */
    public function __construct(
        CourseRepository $courseRepository,
        CourseBuilder $courseBuilder,
        CourseUpdater $courseUpdater
    ) {
        $this->courseRepository = $courseRepository;
        $this->courseBuilder = $courseBuilder;
        $this->courseUpdater = $courseUpdater;
    }

    /**
     * @Route("", name="list", methods={"GET"})
     *
     * @return Response
     */
    public function coursesList(): Response
    {
        $courses = $this->courseRepository->findAll();

        return $this->json(
            array_map(fn(Course $course) => (new DataMapper($course))->toEndpointFormat(), $courses)
        );
    }

    /**
     * @Route("", name="add", methods={"POST"})
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws ValidationException
     */
    public function addCourse(Request $request): Response
    {
        $course = $this->courseBuilder
            ->setData($request->request->all())
            ->createCourseWithUserPermissions();

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        return $this->json((new DataMapper($course))->toEndpointFormat(), Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="edit", methods={"PUT"})
     *
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     *
     * @throws ValidationException
     */
    public function editCourse(Request $request, int $id)
    {
        $course = $this->courseRepository->find($id);

        $this->courseUpdater
            ->setCourse($course)
            ->setData($request->request->all())
            ->update();

        $this->entityManager->flush();

        return $this->json(true);
    }

    /**
     * @Route("/{id}/categories/{categoryId}", name="add_course_category", methods={"POST"})
     */
    public function addCourseCategory(Request $request, int $id, int $categoryId)
    {
        // TODO: Implement add course category endpoint
    }

    /**
     * @Route("/{id}/categories/{categoryId}", name="remove_course_category", methods={"DELETE"})
     */
    public function removeCourseCategory(Request $request, int $id, int $categoryId)
    {
        // TODO: Implement remove course category endpoint
    }

    /**
     * @Route("/{id}/levels/{levelId}", name="set_course_level", methods={"POST"})
     */
    public function setCourseLevel(Request $request, int $id, int $levelId)
    {
        // TODO: Implement set course level endpoint
    }

    /**
     * @Route("/{id}/levels/{levelId}", name="remove_course_level", methods={"DELETE"})
     */
    public function removeCourseLevel(Request $request, int $id, int $levelId)
    {
        // TODO: Implement remove course level endpoint
    }

    /**
     * @Route("/{id}/course-technologies", name="add_course_technolog", methods={"POST"})
     */
    public function addCourseTechnology(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{id}/course-technologies/{courseTechnologyId}", name="remove_course_technology", methods={"DELETE"})
     */
    public function removeCourseTechnology(Request $request, int $id, int $courseTechnologyId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{id}/course-characteristics", name="add_course_characteristic", methods={"POST"})
     */
    public function addCourseCharacteristic(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{id}/course-characteristics/{courseCharacteristicId}", name="remove_course_characteristic", methods={"DELETE"})
     */
    public function removeCourseCharacteristic(Request $request, int $id, int $courseCharacteristicId): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{id}/course-translations", name="add_course_translation", methods={"POST"})
     */
    public function addCourseTranslation(Request $request, int $id): Response
    {
        return $this->json(true);
    }

    /**
     * @Route("/{id}/course-translations/{courseTranslationId}", name="remove_course_translation", methods={"DELETE"})
     */
    public function removeCourseTranslation(Request $request, int $id, int $courseTranslationId): Response
    {
        return $this->json(true);
    }
}