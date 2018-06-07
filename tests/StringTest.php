<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    /**
     * @test
     */
    public function testEndsWith()
    {
        $this->assertTrue(
            endsWith('Hi, this is me', 'me')
        );
    }

    /**
     * @test
     */
    public function testStartsWith()
    {
        $this->assertTrue(
            startsWith('Hi, this is me', 'Hi')
        );
    }

    /**
     * @test
     */
    public function testIsUpperCase()
    {
        $this->assertTrue(
            isUpperCase('Morning shows the day!')  
        );
    }

    /**
     * @test
     */
    public function testIsLowerCase()
    {
        $this->assertTrue(
            isLowerCase('i')
        );
    }

    /**
     * @test
     */
    public function testIsAnagram()
    {
        $this->assertTrue(
            isAnagram('act','cat')
        );
    }

    /**
     * @test
     */
    public function testPalindrome()
    {
        $this->assertTrue(
            palindrome('racecar')
        );
    }
}
