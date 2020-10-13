<?php

namespace App\Tests\Controller;

use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CourseControllerTest extends WebTestCase
{
    public function testCoursesList()
    {
        $client = self::createClient();

        $client->request('GET', '/api/courses');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Course controller should return http code 200");
        $this->assertJson($client->getResponse()->getContent(), "Course controller should return valid json");
    }

    public function testCourseAdd()
    {
        $client = self::createClient();

        $client->request('POST', '/api/courses', [
            'name' => 'hello',
            'author' => 'Bob',
            'duration' => '50y',
            'release_date' => (new \DateTime('now')),
            'is_reviewed' => true,
            'price' => '10zł',
            'language' => 'en',
            'repository_url' => 'http://sdf.pl/repo',
            'url' => 'http://url.pl'
        ]);

        $content = $client->getResponse()->getContent();

        $this->assertEquals(201, $client->getResponse()->getStatusCode(), "Course controller should return http code 201");
        $this->assertJson($content, "Course controller should return valid json");

        $object = json_decode($content);

        $this->assertEquals('hello', $object->name);
        $this->assertEquals('Bob', $object->author);
        $this->assertEquals('50y', $object->duration);
        $this->assertRegExp('/^\d+-\d+-\d+/', $object->release_date->date);
        $this->assertEquals(false, $object->is_reviewed);
        $this->assertEquals('10zł', $object->price);
        $this->assertEquals('en', $object->language);
        $this->assertEquals('http://sdf.pl/repo', $object->repository_url);
        $this->assertEquals('http://url.pl', $object->url);
    }

    public function testCourseEdit()
    {
        $client = static::createClient();
        $kernel = static::bootKernel();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $entityManager->getRepository(Course::class);

        $object = new Course();
        $object
            ->setName('asd')
            ->setLanguage('en')
            ->setDuration('12')
            ->setAuthor('asd')
            ->setReleaseDate(new \DateTime('now'))
            ->setPrice('123')
            ->setUrl('fds')
            ->setTitle('nice')
            ->setRepositoryUrl('asd')
            ->setIsReviewed(true);


        $entityManager->persist($object);
        $entityManager->flush();

        $client->request('PUT', sprintf('/api/courses/%s', $object->getId()), [
            'name' => 'test1',
            'language' => 'pl',
            'duration' => 'test2',
            'author' => 'test4',
            'release_date' => new \DateTime('now'),
            'price' => '1000',
            'title' => 'test5',
            'repository_url' => 'test3',
            'is_reviewed' => false
        ]);

        $entityManager->refresh($object);

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Course controller should return http code 200");
        $this->assertJson($client->getResponse()->getContent(), "Course controller should return valid json");

        $this->assertEquals('test1', $object->getName());
        $this->assertEquals('test4', $object->getAuthor());
        $this->assertEquals('test2', $object->getDuration());
        $this->assertRegExp('/^\d+-\d+-\d+/', $object->getReleaseDate()->format('H-i-s'));
        $this->assertEquals(true, $object->getIsReviewed());
        $this->assertEquals('1000', $object->getPrice());
        $this->assertEquals('pl', $object->getLanguage());
        $this->assertEquals('test3', $object->getRepositoryUrl());
        $this->assertEquals('fds', $object->getUrl());

        $entityManager->close();
    }

}