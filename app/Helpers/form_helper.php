<?php

/*
 * This file is part of the AT Tech Test.
 *
 * @author Rajesh Sundararajan <rajeshrhino@gmail.com>
 */

/*
 * Form related helper functions
 */

if(!function_exists('set_value_get'))
{
    function set_value_get($field, $html_escape = TRUE)
    {
        $CI = get_instance();

        $value = $CI->get($field);

        return htmlspecialchars($value);
    }
}