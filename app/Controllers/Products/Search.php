<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;

class Search extends BaseController
{
	protected $geo = 'en';

	public function index()
	{
		helper('form');

		$header_data = [
            'page_title' => 'Product Search',
        ];	
		return view('Common/header', $header_data)
            . view('Products/search_form')
            . view('Common/footer');
	}


}