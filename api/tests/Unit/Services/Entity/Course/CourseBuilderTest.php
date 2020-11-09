<?php

namespace App\Tests\Unit\Services\Entity\Course;

use App\Entity\Course;
use App\Service\Entity\Course\CourseBuilder;
use App\Service\Entity\Course\CourseDictionary;
use App\Tests\UnitTestCase;

class CourseBuilderTest extends UnitTestCase
{
    public function testBuild()
    {
        /** @var CourseBuilder $validator */
        $builder = self::$container->get(CourseBuilder::class);

        /** @var Course $course */
        $course = $builder
            ->setData([
                CourseDictionary::PRICE => 12.34,
                CourseDictionary::LANGUAGE => 'en',
                'somerandomkey' => 'hello'
            ])
            ->build();

        $this->assertEquals('en', $course->getLanguage());
        $this->assertEquals(12.34, $course->getPrice());
        $this->assertEquals('', $course->getName());
    }
}