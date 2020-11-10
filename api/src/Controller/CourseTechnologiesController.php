<?php

namespace App\Controller;

use App\Entity\CourseTechnology;
use App\Repository\CourseTechnologyRepository;
use App\Service\Entity\CourseTechnology\CourseTechnologyBuilder;
use App\Service\Entity\CourseTechnology\CourseTechnologyFormatter;
use App\Service\Entity\CourseTechnology\CourseTechnologyUpdater;
use App\Service\Validation\ValidationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/course-technologies", name="api_course_technologies_")
 */
class CourseTechnologiesController extends AbstractController
{
    private CourseTechnologyBuilder $courseTechnologyBuilder;
    private CourseTechnologyRepository $courseTechnologyRepository;
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;

    /**
     * CourseTechnologiesController constructor.
     * @param CourseTechnologyBuilder $courseTechnologyBuilder
     * @param CourseTechnologyRepository $courseTechnologyRepository
     * @param EntityManagerInterface $entityManager
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CourseTechnologyBuilder $courseTechnologyBuilder,
        CourseTechnologyRepository $courseTechnologyRepository,
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    )
    {
        $this->courseTechnologyBuilder = $courseTechnologyBuilder;
        $this->courseTechnologyRepository = $courseTechnologyRepository;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @Route("/{id}", name="find", methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function courseTechnologiesFind(int $id): JsonResponse
    {
        return $this->json([
            'data' => [
                'course' => $this->toArray(
                    $this->courseTechnologyRepository->find($id))

            ]
        ]);
    }

    /**
     * @Route("", name="list", methods={"GET"})
     * @return JsonResponse
     */
    public function courseTechnologiesList(): JsonResponse
    {
        $technologies = $this->courseTechnologyRepository->findAll();

        return $this->json([
            'data' => [
                'courses' => array_map(
                    fn(CourseTechnology $technology) => $this->toArray($technology), $technologies
                )
            ]
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function addTechnology(Request $request): JsonResponse
    {
        /** @var CourseTechnology $technology */
        $technology = $this->courseTechnologyBuilder
            ->setData($request->request->all())
            ->build();

        $this->entityManager->persist($technology);
        $this->entityManager->flush();

        return $this->json([
            'data' => [
                'course' => $this->toArray($technology)
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="edit", methods={"PUT"})
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function editTechnology(Request $request, int $id): JsonResponse
    {
        $technology = $this->courseTechnologyRepository->find($id);

        (new CourseTechnologyUpdater($this->validator, $technology))
            ->setData($request->request->all())
            ->update();

        $this->entityManager->flush();

        return $this->json([
            'data' => [
                'course' => $this->toArray($technology)
            ]
        ]);
    }

    /**
     * @Route("/{id}", name="remove", methods={"DELETE"})
     * @param int $id
     * @return JsonResponse
     */
    public function removeTechnology(int $id): JsonResponse
    {
        $technology = $this->courseTechnologyRepository->find($id);

        $this->entityManager->remove($technology);
        $this->entityManager->flush();

        return $this->json([], Response::HTTP_NO_CONTENT);
    }

    public function toArray(CourseTechnology $technology)
    {
        return (new CourseTechnologyFormatter($technology))->toArrayFormat();
    }
}
