<?php

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testAverage()
    {
        $this->assertEquals(
            2,
            average(1, 2, 3)
        );

        $this->assertEquals(
            0,
            average()
        );
    }

    public function testFactorial()
    {
        $this->assertEquals(
            720,
            factorial(6)
        );
    }

    public function testFibonacci()
    {
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5],
            fibonacci(6)
        );
    }

    public function testGCD()
    {
        $this->assertEquals(
            4,
            gcd(8, 36)
        );

        $this->assertEquals(
            4,
            gcd(12, 8, 32)
        );
    }

    public function testLCM()
    {
        $this->assertEquals(
            84,
            lcm(12, 7)
        );

        $this->assertEquals(
            60,
            lcm(1, 3, 4, 5)
        );
    }

    public function testIsPrime()
    {
        $this->assertTrue(
            isPrime(3)
        );

        $this->assertFalse(
            isPrime(4)
        );
    }

    public function testIsEven()
    {
        $this->assertTrue(
            isEven(4)
        );
    }

    public function testMedian()
    {
        $this->assertEquals(
            6,
            median([1, 3, 3, 6, 7, 8, 9])
        );

        $this->assertEquals(
            4.5,
            median([1, 2, 3, 6, 7, 9])
        );
    }
}
