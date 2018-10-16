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

    public function testMaxN()
    {
        $this->assertEquals(
            1,
            maxN([1, 2, 3, 4, 5])
        );

        $this->assertEquals(
            2,
            maxN([1, 2, 3, 4, 5, 5])
        );
    }

    public function testMinN()
    {
        $this->assertEquals(
            1,
            minN([1, 2, 3, 4, 5, 5])
        );

        $this->assertEquals(
            2,
            minN([1, 1, 2, 3, 4, 5, 5])
        );
    }

    public function testApproximatelyEqual()
    {
        $this->assertTrue(approximatelyEqual(10.0, 10.00001));

        $this->assertFalse(approximatelyEqual(10.0, 10.01));
    }

    public function testClampNumber()
    {
        $this->assertEquals(3, clampNumber(2, 3, 5));

        $this->assertEquals(-1, clampNumber(1, -1, -5));
    }
}
