<?php

namespace App\Tests\Unit\Services\Entity\Course;

use App\Entity\Course;
use App\Entity\CourseArea;
use App\Service\Entity\Course\CourseFormatter;
use App\Tests\UnitTestCase;

class CourseFormatterTest extends UnitTestCase
{
    public function testToArrayFormat()
    {
        $data = (new CourseFormatter($this->prepareCourse()))
            ->with('areas', 'areas.courses')
            ->with('areas.courses')
            ->skip('name')
            ->skip('areas.name', 'areas.courses.repository_url')
            ->toArrayFormat();

        $this->assertFalse(key_exists('name', $data));
        $this->assertEquals('author', $data['author']);
        $this->assertEquals('test_url', $data['repository_url']);
        $this->assertEquals(10, $data['duration']);
        $this->assertEquals(true, $data['areas'][0]['is_active']);
        $this->assertEquals(false, $data['areas'][1]['is_active']);
        $this->assertFalse(isset($data['areas'][0]['name']));
        $this->assertFalse(isset($data['areas'][1]['name']));
        $this->assertEquals('author', $data['areas'][0]['courses'][0]['author']);
        $this->assertEquals('author', $data['areas'][1]['courses'][0]['author']);
        $this->assertFalse(isset($data['areas'][0]['courses'][0]['repository_url']));
        $this->assertFalse(isset($data['areas'][1]['courses'][0]['repository_url']));
        $this->assertEmpty($data['areas'][0]['courses'][0]['areas']);
    }

    private function prepareCourse()
    {
        $area1 = new CourseArea();
        $area1->setName('name1');
        $area1->setIsActive(1);

        $area2 = new CourseArea();
        $area2->setName('name2');
        $area2->setIsActive(0);

        $course = new Course();
        $course->setName('name');
        $course->setAuthor('author');
        $course->setDuration(10);
        $course->setRepositoryUrl('test_url');
        $course->addArea($area1);
        $course->addArea($area2);

        return $course;
    }
}