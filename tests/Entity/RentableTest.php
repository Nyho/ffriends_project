<?php

namespace App\Tests\Entity;

use App\Entity\Rentable;
use http\Message;
use PHPUnit\Framework\TestCase;

class RentableTest extends TestCase
{

    public function testSetDescription()
    {

    }

    public function testSetLastName()
    {

    }

    public function testSetAgeCaPasse()
    {
        // Arrange
        $rentable = new Rentable();
        // Act
        $rentable-> setAge(14);
        // Assert
        $this->assertEquals(14, $rentable->getAge());
    }

    public function testSetAgeCPT()
    {
        // Arrange
        $rentable = new Rentable();
        // Act
        $rentable-> setAge(null);
        // Assert
        $this->assertEquals(null, $rentable->getAge());
    }

    public function testSetAgeCTro()
    {
        // Arrange
        $rentable = new Rentable();
        // Act
        $rentable-> setAge(150);
        // Assert
        $this->assertEquals(InvalidArgumentException, $rentable->getAge());
    }

    public function testSetFirstName()
    {

    }

    public function testSetEmail()
    {

    }
}
