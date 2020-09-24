<?php

namespace App\Tests\Controller;

use App\Controller\CourseTranslationController;
use PHPUnit\Framework\TestCase;

class CourseTranslationControllerTest extends WebTestCase
{
    public function testCourseTranslationList()
    {
        $client = self::createClient();

        $client->request('GET', '/api/course-translations');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "CourseTanslation controller should return http code 200");
        $this->assertJson($client->getResponse()->getContent(), "CourseTranslation controller should return valid json");
    }
}
