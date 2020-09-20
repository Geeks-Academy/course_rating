<?php


namespace App\Controller;

use App\Entity\CourseTranslation;
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
    public function list(Request $request): Response
    {
        $languages = array();

        $translations = $this->getDoctrine()
            ->getRepository(CourseTranslation::class)
            ->findAll();

        foreach($translations as $tr) {
            $languages[] = $tr->getLanguage();
        }

        return $this->json($languages);
    }
}