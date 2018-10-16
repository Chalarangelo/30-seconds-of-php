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

    public function testIsContains()
    {
        $this->assertTrue(
            isContains('This is an example string', 'example')
        );
    }

    public function testIsUpperCase()
    {
        $this->assertTrue(
            isUpperCase('MORNING SHOWS THE DAY!')
        );
    }

    public function testIsLowerCase()
    {
        $this->assertTrue(
            isLowerCase('morning shows the day!')
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

        $this->assertSame(
            '',
            firstStringBetween('This is a [custom] string', '[', '#')
        );
    }

    public function testCountVowels()
    {
        $this->assertSame(4, countVowels('sampleInput'));

        $this->assertSame(0, countVowels(''));
    }

    public function testDecapitalize()
    {
        $this->assertSame('fooBar', decapitalize('FooBar'));

        $this->assertSame('fOOBAR', decapitalize('FooBar', true));
    }
}
