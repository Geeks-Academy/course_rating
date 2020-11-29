<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/api", name="api_welcome", methods={"GET"})
     */
    public function welcome(): Response
    {
        return $this->json([
            'title' => 'Course rating API',
            'description' => 'API for brutal course rating',
        ]);
    }

    /**
     * @Route("/api/health", name="api_health", methods={"GET"})
     */
    public function health(): Response
    {
        return new Response('OK');
    }
}
