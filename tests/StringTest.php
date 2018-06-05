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
}
