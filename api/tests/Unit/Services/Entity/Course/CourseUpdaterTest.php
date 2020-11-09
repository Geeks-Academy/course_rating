<?php

namespace App\Tests\Unit\Services\Entity\Course;

use App\Entity\Course;
use App\Service\Entity\Course\CourseDictionary;
use App\Service\Entity\Course\CourseUpdater;
use App\Service\Validation\ValidationException;
use App\Tests\UnitTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CourseUpdaterTest extends UnitTestCase
{
    /**
     * @throws ValidationException
     */
    public function testUpdate()
    {
        /** @var ValidatorInterface $validator */
        $validator = self::$container->get(ValidatorInterface::class);

        /** @var Course $course */
        $course = (new CourseUpdater($validator, new Course()))
            ->setData([
                CourseDictionary::NAME => 'name',
                'somerandomkey' => 'hellos'
            ])
            ->update();

        $this->assertEquals('name', $course->getName());
        $this->assertNull($course->getPrice());
    }
}