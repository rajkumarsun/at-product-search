<?php

namespace App\Controllers\Products;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class SearchTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    protected $search_obj;
    protected $search_title;

    protected function setUp(): void
    {
        $this->search_obj = new Search();

        $this->search_title = 'Disney';
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testClassExists()
    {
        $this->assertInstanceOf(Search::class, $this->search_obj);
    }

    public function testDefaultLimit()
    {
        $this->assertIsNumeric($this->getPrivateProperty($this->search_obj, 'limit'));
    }

    public function testProductSearch()
    {
        $result = $this->search_obj->getSearchResult([
            'geo' => 'en',
        ]);

        $this->assertArrayHasKey('products', $result);

        $this->assertArrayHasKey('meta', $result);
    }

    public function testProductSearchWithTitleCriteria()
    {
        $result = $this->search_obj->getSearchResult([
            'title' => $this->search_title,
            'geo' => 'en',
        ]);

        $first_product_title = $result['products'][0]->title;

        $this->assertStringContainsString($this->search_title, $first_product_title);
    }
}