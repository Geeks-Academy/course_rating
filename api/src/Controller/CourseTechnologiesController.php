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
use OpenApi\Annotations as OA;

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
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Identifier of the course technology",
     *     @OA\Schema(type="integer")
     * )
     * @OA\Response(
     *     response="200",
     *     description="Course technology has been found",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(
     *             property="data",
     *             @OA\Property(property="technology", type="object", ref="#/components/schemas/Course Technology")
     *         )
     *     )
     * )
     * @OA\Tag(name="Course Technologies")
     *
     * @param int $id
     * @return JsonResponse
     */
    public function courseTechnologiesFind(int $id): JsonResponse
    {
        return $this->json([
            'data' => [
                'technology' => $this->toArray(
                    $this->courseTechnologyRepository->find($id))

            ]
        ]);
    }

    /**
     * @Route("", name="list", methods={"GET"})
     * @OA\Response(
     *     response="200",
     *     description="Course technologies has been fetched",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(
     *             type="object",
     *             property="data",
     *             @OA\Property(
     *                 type="array",
     *                 property="technologies",
     *                 @OA\Items(
     *                     ref="#/components/schemas/Course Technology"
     *                 )
     *             )
     *         )
     *     )
     * )
     * @OA\Tag(name="Course Technologies")
     *
     * @return JsonResponse
     */
    public function courseTechnologiesList(): JsonResponse
    {
        $technologies = $this->courseTechnologyRepository->findAll();

        return $this->json([
            'data' => [
                'technologies' => array_map(
                    fn(CourseTechnology $technology) => $this->toArray($technology), $technologies
                )
            ]
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     * @OA\RequestBody(
     *     @OA\JsonContent(
     *          type="object",
     *          ref="#/components/schemas/Course Technology Edit"
     *     )
     * )
     * @OA\Response(
     *     response="201",
     *     description="Course technology has been created",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(
     *             type="object",
     *             property="data",
     *             @OA\Property(property="technology", type="object", ref="#/components/schemas/Course Technology")
     *         )
     *     )
     * )
     * @OA\Tag(name="Course Technologies")
     *
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
                'technology' => $this->toArray($technology)
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="edit", methods={"PUT"})
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Identifier of the course technology",
     *     @OA\Schema(type="integer")
     * )
     * @OA\RequestBody(
     *     @OA\JsonContent(
     *          type="object",
     *          ref="#/components/schemas/Course Technology Edit"
     *     )
     * )
     * @OA\Response(
     *     response="200",
     *     description="Course technology are has been updated",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(
     *             property="data",
     *             @OA\Property(property="technology", type="object", ref="#/components/schemas/Course Technology")
     *         )
     *     )
     * )
     * @OA\Tag(name="Course Technologies")
     *
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
                'technology' => $this->toArray($technology)
            ]
        ]);
    }

    /**
     * @Route("/{id}", name="remove", methods={"DELETE"})
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Identifier of the course technology",
     *     @OA\Schema(type="integer")
     * )
     * @OA\Response(
     *     response="204",
     *     description="Course technology has been deleted",
     * )
     * @OA\Tag(name="Course Technologies")
     *
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

    public function toArray(CourseTechnology $technology, array $with = [])
    {
        return (new CourseTechnologyFormatter($technology))
            ->with(...$with)
            ->toArrayFormat();
    }
}
