<?php

use App\Models\Pageoption;

if (!function_exists('homeSliderSection')) {

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
    function homeSliderSection($page= 'home', $option="home-slider", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}


if (!function_exists('homeAboutSection')) {

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
    function homeAboutSection($page= 'home', $option="home-about", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('homeServiceSection')) {

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
    function homeServiceSection($page= 'home', $option="home-service", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('homeChooseUsSection')) {

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
    function homeChooseUsSection($page= 'home', $option="home-choose-us", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('homeAchievementSection')) {

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
    function homeAchievementSection($page= 'home', $option="home-achievement", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('homeOthersSection')) {

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
    function homeOthersSection($page= 'home', $option="home-others-sections", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}

if (!function_exists('homeSeoMetaSection')) {

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
    function homeSeoMetaSection($page= 'home', $option="home-seo-meta", $default = null)
    {
        return json_decode(Pageoption::getPageSection($page, $option, $default), true);
    }
}
