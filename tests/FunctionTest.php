<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAverage()
    {
        $compose = compose(
            // add 2
            function ($x) {
                return $x + 2;
            },
            // multiply 4
            function ($x) {
                return $x * 4;
            }
        );

        $this->assertEquals(
            20,
            $compose(3)
        );
    }
}
