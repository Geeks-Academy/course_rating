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
            ->skip('areas.name', 'areas.courses.repositoryUrl')
            ->toArrayFormat();

        $this->assertFalse(key_exists('name', $data));
        $this->assertEquals('author', $data['author']);
        $this->assertEquals('test_url', $data['repositoryUrl']);
        $this->assertEquals(10, $data['duration']);
        $this->assertEquals(true, $data['areas'][0]['isActive']);
        $this->assertEquals(false, $data['areas'][1]['isActive']);
        $this->assertFalse(isset($data['areas'][0]['name']));
        $this->assertFalse(isset($data['areas'][1]['name']));
        $this->assertEquals('author', $data['areas'][0]['courses'][0]['author']);
        $this->assertEquals('author', $data['areas'][1]['courses'][0]['author']);
        $this->assertFalse(isset($data['areas'][0]['courses'][0]['repositoryUrl']));
        $this->assertFalse(isset($data['areas'][1]['courses'][0]['repositoryUrl']));
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
