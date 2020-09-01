<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    var $courses = array();

    /**
     * @Route("/", name="welcome")
     * @Method ({"GET","HEAD"})
     */
    public function welcome()
    {
        return new Response('Welcome to course rating');
    }

    /**
    * @Route("/courses", name="courses_list")
     * @Method ({"GET","HEAD"})
    */
    public function coursesList()
    {
        $this->courses = ['test'=>'1','test2'=>'2','test3'=>'3'];
        return $this->json(
           $this->courses
        );
    }

    /**
     * @Route("/course/add", name="course_add")
     * @Method ({"POST"})
     */
    public function addCourse() {
        return $this->json(true);
    }

    /**
     * @Route("/course/get/{$id}", name="course_get")
     * @Method ({"GET","HEAD"})"
     */
    public function getCourse(int $id) {
        return $this->json(true);
    }

    /**
     * @Route("/health", name="health")
     * @Method ({"GET","HEAD"})"
     */
    public function getHealth() {
        return $this->json(true);
    }

}