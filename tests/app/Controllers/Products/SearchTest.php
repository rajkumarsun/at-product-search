<?php

namespace App\Controllers\Products;

use CodeIgniter\Test\CIUnitTestCase;

class SearchTest extends CIUnitTestCase
{
	protected $search;

	protected function setUp(): void
	{
		$this->search = new Search();
	}

	protected function tearDown(): void
	{
		parent::tearDown();
	}

	public function testClassExists()
	{
		$this->assertInstanceOf(Search::class, $this->search);
	}
}