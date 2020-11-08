<?php

namespace App\Controller;

use App\Entity\CourseArea;
use App\Repository\CourseAreaRepository;
use App\Service\Entity\CourseArea\CourseAreaBuilder;
use App\Service\Entity\CourseArea\CourseAreaFormatter;
use App\Service\Entity\CourseArea\CourseAreaUpdater;
use App\Service\Validation\ValidationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/course-areas", name="api_course-areas_")
 */
class CourseAreaController extends AbstractController
{
    private CourseAreaRepository $courseAreaRepository;
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;
    private CourseAreaBuilder $courseAreaBuilder;

    public function __construct(
        CourseAreaRepository $courseAreaRepository,
        EntityManagerInterface $entityManager,
        CourseAreaBuilder $courseAreaBuilder,
        ValidatorInterface $validator
    )
    {
        $this->courseAreaRepository = $courseAreaRepository;
        $this->entityManager = $entityManager;
        $this->courseAreaBuilder = $courseAreaBuilder;
        $this->validator = $validator;
    }

    /**
     * @Route("", name="list", methods={"GET"})
     *
     * @return Response
     */
    public function courseAreasList()
    {
        $areas = $this->courseAreaRepository->findAll();

        return $this->json(
            ['data' => array_map(fn(CourseArea $area) => $this->toArray($area), $areas)]
        );
    }

    /**
     * @Route("/{id}", name="find", methods={"GET"})
     *
     * @param int $id
     * @return Response
     */
    public function courseAreasFind(int $id)
    {
        return $this->json(
            ['data' => $this->toArray($this->courseAreaRepository->find($id))]
        );
    }

    /**
     * @Route("", name="add", methods={"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function addCourseArea(Request $request)
    {
        /** @var CourseArea $area */
        $area = $this->courseAreaBuilder
            ->setData($request->request->all())
            ->build();

        $this->entityManager->persist($area);
        $this->entityManager->flush();

        return $this->json(
            ['data' => $this->toArray($area)], Response::HTTP_CREATED
        );
    }

    /**
     * @Route("/{id}", name="edit", methods={"PUT"})
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function editCourseArea(Request $request, int $id): Response
    {
        $area = $this->courseAreaRepository->find($id);

        (new CourseAreaUpdater($this->validator, $area))
            ->setData($request->request->all())
            ->update();

        $this->entityManager->persist($area);
        $this->entityManager->flush();

        return $this->json(
            ['data' => $this->toArray($area)], Response::HTTP_OK
        );
    }

    /**
     * @Route("/{id}", name="remove", methods={"DELETE"})
     *
     * @param int $id
     * @return JsonResponse
     */
    public function removeCourseArea(int $id)
    {
        $area = $this->courseAreaRepository->find($id);

        $this->entityManager->remove($area);
        $this->entityManager->flush();

        return $this->json([], Response::HTTP_NO_CONTENT);
    }

    private function toArray(CourseArea $area): array
    {
        return (new CourseAreaFormatter($area))->toArrayFormat();
    }
}