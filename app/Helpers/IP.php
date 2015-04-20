<?php namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;

/**
 * Class IP
 * Main class for smaller helper functions that are used everywhere
 * @package App\Helpers
 */
class IP
{

    /**
     * IP::getAllLanguages()
     * Returns an array with all availalbe languages
     * @return array
     */
    public static function getAllLanguages()
    {
        $languages = array();
        // First get all language directories
        $dirs = File::directories(base_path() . '/resources/lang');
        foreach ($dirs as $dir) {
            // Format the directory strings
            $lang = str_replace(base_path() . '/resources/lang/', '', $dir);
            // Push to the languages array with the localized language name
            $languages[$lang] = Lang::get('global.ln', array(), $lang);
        }
        return $languages;
    }

    /**
     * IP::random_string($length)
     * Returns a random string with the length of $length
     * @param $length
     * @return string
     */
    public static function randomString($length)
    {
        $string = substr(str_shuffle(md5(microtime())), 0, $length);
        return $string;
    }

    /**
     * IP::generateURL
     * Generates a unique URL for Vouchers
     * @return string
     */
    public static function generateURL()
    {
        $url_available = false;
        while ($url_available === false) {
            // Generate an URL
            $url = self::random_string(15);
            // @TODO IP - Check if the URL already exists
            $url_available = true;
        }
        // Return the URL
        return $url;
    }

}
