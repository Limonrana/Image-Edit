<?php

use App\Models\Pageoption;
use App\Models\Upload;

if (!function_exists('contactPageInfo')) {

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
    function contactPageInfo($page= 'contact', $option="contact-us-details", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}


if (!function_exists('contactSeoMetaSection')) {

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
    function contactSeoMetaSection($page= 'contact', $option="contact-seo-meta", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('findImagePath')) {

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
    function findImagePath($id, $default = null)
    {
        return Upload::getImage($id, $default);
    }
}
