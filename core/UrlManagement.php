<?php
/**
 * Created by PhpStorm.
 * User: Bao Chung
 * Date: 8/2/14
 * Time: 6:36 PM
 */

namespace cf\core;


class UrlManagement extends Object{
    public static function currentUrl(){
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function getHost(){
        return $_SERVER['HTTP_HOST'];
    }

    public static function getRequestUri(){
        return $_SERVER['REQUEST_URI'];
    }
} 