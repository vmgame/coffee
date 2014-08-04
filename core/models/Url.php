<?php
/**
 * Created by PhpStorm.
 * User: Bao Chung
 * Date: 8/3/14
 * Time: 6:55 PM
 */

namespace cf\core\models;


use cf\core\Object;

class Url extends Object{
    public $modules = [];
    public $controller = '';
    public $action = '';
    public $params = [];

    function __construct($requestUri = "")
    {
        $part = parse_url($requestUri);
        if (!$part) return;
        parse_str($part['query'], $params);
        $paths = explode('/', $part['path']);
    }

} 