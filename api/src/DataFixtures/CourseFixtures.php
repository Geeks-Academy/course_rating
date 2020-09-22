<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CourseFixtures extends Fixture
{
    protected Generator $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $course = new Course();

            $course->setName($this->faker->sentence(4));
            $course->setTitle($this->faker->title);
            $course->setIsReviewed($this->faker->boolean);
            $course->setReleaseDate($this->faker->dateTime);
            $course->setRepositoryUrl($this->faker->url);
            $course->setUrl($this->faker->url);
            $course->setAuthor($this->faker->name);
            $course->setLanguage($this->faker->languageCode);
            $course->setDuration($this->faker->word);

            $manager->persist($course);
        }

        $manager->flush();
    }
}
