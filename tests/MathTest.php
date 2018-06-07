<?php

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * @test
     */
    public function testAverage()
    {
        $this->assertEquals(
            2,
            average(1, 2, 3)
        );
    }

    /**
     * @test
     */
    public function testAverageIsSafe()
    {
        $this->assertEquals(
            0,
            average()
        );
    }

    /**
     * @test
     */
    public function testFactorial()
    {
        $this->assertEquals(
            720,
            factorial(6)
        );
    }

    /**
     * @test
     */
    public function testFibonacci()
    {
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5],
            fibonacci(6)
        );
    }

    /**
     * @test
     */
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

    /**
     * @test
     */
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

    /**
     * @test
     */
    public function testIsPrime()
    {
        $this->assertTrue(
            isPrime(3)
        );
    }

    /**
     * @test
     */
    public function testIsEven()
    {
        $this->assertTrue(
            isEven(4)
        );
    }

    /**
     * @test
     */
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
