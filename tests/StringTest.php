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
            endsWith('Example', 'e')
        );
    }

    /**
     * @startsWith test
     */
    public function testStartsWith()
    {

        $this->assertFalse(
            startsWith('Example', 'e')
        );
    }
}
