<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{

	/**
	 * @endsWith test
	 */
	public function testEndsWith()
	{

		$this->assertEquals(
			true,
			endsWith('Example','e')
		);

	}

	/**
	 * @startsWith test
	 */
	public function testStartsWith()
	{

		$this->assertEquals(
			false,
			startsWith('Example','e')
		);
	}
}