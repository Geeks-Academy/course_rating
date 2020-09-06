<?php

namespace App\Controller;

use http\Client\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    var $courses = array();

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function welcome()
    {
        return new Response('Welcome to course rating');
    }

    /**
    * @Route("/courses", name="courses_list", methods={"GET"})
    */
    public function coursesList()
    {
        $this->courses = ['test'=>'1','test2'=>'2','test3'=>'3'];
        return $this->json(
           $this->courses
        );
    }

    /**
     * @Route("/courses", name="course_add, methods={"POST"}")
     */
    public function addCourse() {
        return $this->json(true);
    }

    /**
     * @Route("/courses/{$id}", name="course_get", methods={"PUT"})
     */
    public function getCourse(int $id) {
        return $this->json(true);
    }

    /**
     * @Route("/health", name="health", methods={"GET"})
     */
    public function getHealth() {
        return new Response($this->json(true),200);
    }

    /**
     * @Route("/CourseRatings", name="", methods={"GET"}
     */
    public function getCourseRatings() {
        $courses_ratings = ['test'=>'1','test2'=>'2','test3'=>'3'];
        return new Response($this->json($courses_ratings),200);
    }

}