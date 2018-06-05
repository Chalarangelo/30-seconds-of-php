<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    /**
     * @endsWith test
     */
    public function testEndsWith()
    {
        $this->assertTrue(
            endsWith('Hi, this is me', 'me')
        );
    }

    /**
     * @startsWith test
     */
    public function testStartsWith()
    {

        $this->assertTrue(
            startsWith('Hi, this is me', 'Hi')
        );
    }
}
