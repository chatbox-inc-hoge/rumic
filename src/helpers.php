<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/04
 * Time: 19:48
 */

if (! function_exists('db')) {
    /**
     * Get the available container instance.
     *
     * @param  string  $make
     * @param  array   $parameters
     * @return \Illuminate\Database\DatabaseManager
     */
    function db($make = null, $parameters = [])
    {
        return Container::getInstance()->make("db");
    }
}
