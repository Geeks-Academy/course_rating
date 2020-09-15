<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/course-translations", name="api_course_translations")
 */
class CourseTranslationController extends AbstractController
{
    /**
     * @Route("", name="list", methods={"GET"})
     */
    public function courseTranslationList(Request $request): Response
    {
        return $this->json([
            [
                'language' => 'pl',
            ],
            [
                'language' => 'en',
            ]
        ]);
    }
}