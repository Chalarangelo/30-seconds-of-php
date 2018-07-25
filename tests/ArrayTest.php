<?php

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    public function testAll()
    {
        $this->assertTrue(
            all([2, 3, 4, 5], function ($item) {
                return $item > 1;
            })
        );
    }

    public function testAny()
    {
        $this->assertTrue(
            any([1, 2, 3, 4], function ($item) {
                return $item < 2;
            })
        );
    }

    public function testChunk()
    {
        $this->assertEquals(
            [[1, 2], [3, 4], [5]],
            chunk([1, 2, 3, 4, 5], 2)
        );
    }

    public function testFlatten()
    {
        $this->assertEquals(
            [1, 2, 3, 4],
            flatten([1, [2], 3, 4])
        );
    }

    public function testDeepFlatten()
    {
        $this->assertEquals(
            [1, 2, 3, 4, 5],
            deepFlatten([1, [2], [[3], 4], 5])
        );
    }

    public function testDrop()
    {
        $this->assertEquals(
            [2, 3],
            drop([1, 2, 3])
        );

        $this->assertEquals(
            [3],
            drop([1, 2, 3], 2)
        );
    }

    public function testFindLast()
    {
        $this->assertEquals(
            3,
            findLast([1, 2, 3, 4], function ($n) {
                return ($n % 2) === 1;
            })
        );
    }

    public function testFindLastIndex()
    {
        $this->assertEquals(
            2,
            findLastIndex([1, 2, 3, 4], function ($n) {
                return ($n % 2) === 1;
            })
        );
    }

    public function testHead()
    {
        $this->assertEquals(
            1,
            head([1, 2, 3])
        );
    }

    public function testTail()
    {
        $this->assertEquals(
            [2, 3],
            tail([1, 2, 3])
        );

        $this->assertEquals(
            [3],
            tail([3])
        );
    }

    public function testLast()
    {
        $this->assertEquals(
            3,
            last([1, 2, 3])
        );
    }

    public function testPull()
    {
        $items = ['a', 'b', 'c', 'a', 'b', 'c'];
        pull($items, 'a', 'c');
        $this->assertEquals(
            $items,
            ['b', 'b']
        );
    }

    public function testPluck()
    {
        $this->assertEquals(
            ['Desk', 'Chair'],
            pluck([
                ['product_id' => 'prod-100', 'name' => 'Desk'],
                ['product_id' => 'prod-200', 'name' => 'Chair'],
            ], 'name')
        );
    }

    public function testReject()
    {
        $this->assertEquals(
            ['Pear', 'Kiwi'],
            reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
                return strlen($item) > 4;
            })
        );
    }

    public function testRemove()
    {
        $this->assertEquals(
            [0 => 1, 2 => 3],
            remove([1, 2, 3, 4], function ($n) {
                return ($n % 2) === 0;
            })
        );
    }

    public function testTake()
    {
        $this->assertEquals(
            [1, 2, 3],
            take([1, 2, 3], 5)
        );

        $this->assertEquals(
            [1, 2],
            take([1, 2, 3, 4, 5], 2)
        );
    }

    public function testWithout()
    {
        $this->assertEquals(
            [3],
            without([2, 1, 2, 3], 1, 2)
        );
    }

    public function testHasDuplicates()
    {
        $this->assertTrue(
            hasDuplicates([1, 2, 3, 4, 5, 5])
        );
    }

    public function testGroupBy()
    {
        $this->assertEquals(
            [
                34 => [
                    [
                        'name' => 'Mashrafe',
                        'age' => 34,
                    ],
                ],
                31 => [
                    [
                        'name' => 'Sakib',
                        'age' => 31,
                    ],
                ],
                29 => [
                    [
                        'name' => 'Tamim',
                        'age' => 29,
                    ],
                ],
            ],
            groupBy(
                [
                    ['name' => 'Mashrafe', 'age' => 34],
                    ['name' => 'Sakib', 'age' => 31],
                    ['name' => 'Tamim', 'age' => 29],
                ],
                'age'
            )
        );

        $this->assertEquals(
            [3 => ['one', 'two'], 5 => ['three']],
            groupBy(['one', 'two', 'three'], 'strlen')
        );

        $peterClass = new \stdClass();
        $peterClass->name = 'Peter';
        $peterClass->age = '25';

        $appzcoderClass = new \stdClass();
        $appzcoderClass->name = 'Appzcoder';
        $appzcoderClass->age = '25';

        $this->assertEquals([
            'Peter' => [$peterClass],
            'Appzcoder' => [$appzcoderClass],
        ], groupBy([
            'person' => $peterClass,
            'organization' => $appzcoderClass,
        ], 'name'));
    }

    public function testOrderBy()
    {
        $this->assertEquals(
            [
                ['id' => 3, 'name' => 'Khaja'],
                ['id' => 2, 'name' => 'Joy'],
                ['id' => 1, 'name' => 'Raja']
            ],
            orderBy(
                [
                    ['id' => 2, 'name' => 'Joy'],
                    ['id' => 3, 'name' => 'Khaja'],
                    ['id' => 1, 'name' => 'Raja']
                ],
                'id',
                'desc'
            )
        );
    }
}
