<?php

use App\Models\Pageoption;

if (!function_exists('appearance')) {

    /**
     * Returns appearance details
     *
     * @param string $page
     * Page is a string for set the location
     *
     * @param string $option
     * Option is a string for appearance field
     *
     * @param string null $default
     * This is default @return @value
     *
     * @return array in json format
     *
     * */
    function appearance($option, $page= 'all', $default = null)
    {
        return Pageoption::getAppearance($option, $page, $default);
    }
}
