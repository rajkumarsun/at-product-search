<?php

/*
 * This file is part of the AT Tech Test.
 *
 * @author Rajesh Sundararajan <rajeshrhino@gmail.com>
 */

/*
 * Curl related helper functions
 */
if(!function_exists('perform_curl_request'))
{
   function perform_curl_request($apiendpoint, $method = 'GET', $params = []){
        // Load curl library
        $client = \Config\Services::curlrequest();

        try {
            // Call AT API
            $curl_response = $client->request(
                $method,
                $apiendpoint,
                $params,
            );
            return [
                'is_error' => 0,
                'data' => json_decode($curl_response->getBody()),
            ];
        } catch (\Exception $e) {
            return [
                'is_error' => 1,
                'data' => [],
            ];
        }
   }
}
