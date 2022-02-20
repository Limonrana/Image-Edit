<?php

use App\Models\Pageoption;

if (!function_exists('aboutAboutSection')) {

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
    function aboutAboutSection($page= 'about', $option="about-about-details", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}


if (!function_exists('aboutSeoMetaSection')) {

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
    function aboutSeoMetaSection($page= 'about', $option="about-seo-meta", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}
