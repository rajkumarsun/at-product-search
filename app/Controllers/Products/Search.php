<?php

/*
 * This file is part of the AT Tech Test.
 *
 * @author Rajesh Sundararajan <rajeshrhino@gmail.com>
 */

namespace App\Controllers\Products;

use App\Controllers\BaseController;

/**
 * Products Search Controller
 */
class Search extends BaseController
{
    /**
     * @var int
     */
    protected $limit = 10; // Default limit

    /**
     * Invoked when product search form/page is loaded
     */
    public function index()
    {
        return $this->render([
            'is_error' => 0,
            'display_result' => 0,
            'products' => [],
        ]);
    }

    /**
     * Invoked when product search form is submitted
     */
    public function search()
    {
        // Checks whether the form is submitted.
        if ($this->request->is('get')) {
            $params = $this->request->getGet(['title', 'geo', 'limit', 'page']);

            // Prepare pagination
            $pager = service('pager');
            $page = (int) ($this->request->getGet('page') ?? 1);
            $perPage = (int) ($this->request->getGet('limit') ?? $this->limit);

            // Offset param for API call
            $params['offset'] = ($page - 1) * $perPage;

            // Get search results and pass to render
            $result = $this->getSearchResult($params);

            // Total from API result
            $total = $result['meta']->total_count;

            // Call makeLinks() to make pagination links
            $pager_links = $pager->makeLinks($page, $perPage, $total, 'pager_full');

            // Merge results array with pagination array
            $result = array_merge($result, [
                'pager_links' => $pager_links,
                'currentPage' => $page,
                'totalPages' => ceil($total / $perPage),
            ]);

            // Pass results to render
            return $this->render($result);
        }
    }

    /**
     * Get results for the search criteria
     *
     * @param $params search criteria
     *
     */
    public function getSearchResult($params)
    {
        // Prepare curl params
        $curlparams = [];
        foreach ($params as $key => $value) {
            $curlparams[] = "{$key}={$value}";
        }

        $apiendpoint = API_END_POINT.implode('&', $curlparams);

        // Load curl helper
        helper('curl_helper');

        // Make curl call to get data from API
        $response = perform_curl_request(
            $apiendpoint,
            'GET',
            ['allow_redirects' => false],
        );

        // Prepare result array to be passed to view
        return [
            'is_error' => $response['is_error'],
            'display_result' => 1,
            'products' => $response['data']->data,
            'meta' => $response['data']->meta,
        ];
    }

    /**
     * Renders the product search view
     *
     * @param $result result array with products & meta data
     *
     */
    public function render($result = [])
    {
        // Load helpers
        helper('form');

        // Common data for header and footer
        $header_data = [
            'page_title' => PRODUCT_SEARCH_PAGE_TITLE,
        ];
        $footer_data = [
            'footer_copyright' => FOOTER_COPYRIGHT,
        ];

        // Form options
        // FIXME: Move this to somewhere global
        $form_options = [
            'limit' => [
                10  => 10,
                50 => 50,
                100  => 100,
            ],
            'geo_options' => [
                'en'  => 'UK',
                'en-ie' => 'Ireland',
                'de-de'  => 'German',
            ]
        ];

        return view('Common/header', $header_data)
            . view('Products/search_form', $result + $form_options)
            . view('Products/search_results', $result + $form_options)
            . view('Common/footer', $footer_data);
    }

    /**
     * Function to get default values to be set in the form
     *
     * @param string $field input field name
     *
     * @return string|int input field value
     */
    public function get($field)
    {
        $params = $this->request->getGet([$field]);
        return $params[$field];
    }
}