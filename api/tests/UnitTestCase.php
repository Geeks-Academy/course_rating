<?php

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UnitTestCase extends KernelTestCase
{
    protected function setUp()
    {
        static::bootKernel();
    }
}