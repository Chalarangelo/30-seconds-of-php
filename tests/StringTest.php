<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testEndsWith()
    {
        $this->assertTrue(
            endsWith('Hi, this is me', 'me')
        );
    }

    public function testStartsWith()
    {
        $this->assertTrue(
            startsWith('Hi, this is me', 'Hi')
        );
    }

    public function testIsUpperCase()
    {
        $this->assertTrue(
            isUpperCase('Morning shows the day!')
        );
    }

    public function testIsLowerCase()
    {
        $this->assertTrue(
            isLowerCase('hello')
        );
    }

    public function testIsAnagram()
    {
        $this->assertTrue(
            isAnagram('act', 'cat')
        );
    }

    public function testPalindrome()
    {
        $this->assertTrue(
            palindrome('racecar')
        );
    }

    public function testFirstStringBetween()
    {
        $this->assertSame(
            'custom',
            firstStringBetween('This is a [custom] string', '[', ']')
        );

        $this->assertSame(
            '',
            firstStringBetween('', '[', ']')
        );
    }
}
