<?php
/**
 * Created by PhpStorm.
 * User: Bao Chung
 * Date: 8/2/14
 * Time: 6:25 PM
 */

namespace cf\core;



use app\controllers\AbcController;
use cf\core\models\Url;

class Application extends Object{
    protected $config;
    function __construct($config = [])
    {
        $this->config = array_merge(require_once(__DIR__ . '/Config.php'), $config);
        if (!defined('ROOT')){
            define('ROOT', dirname(debug_backtrace()[0]['file']));
        }
        $loader = new \Composer\Autoload\ClassLoader();
        $loader->addPsr4('app\\', ROOT);
    }

    public static function require_once_file($path){
        require_once(ROOT . DIRECTORY_SEPARATOR . $path . '.php');

    }

    public static function executeController($path){
        self::require_once_file($path);
        $path = 'app\\' . str_replace('/', '\\', $path);
        $controller = new $path();
        $controller->execute();
    }

    public static function refactorName($name){
        $name = strtolower($name);
        $name = ucwords(str_replace('-', ' ', $name));
        return str_replace(' ', '', $name);
    }
    public function run(){
        $url = new Url(UrlManagement::getRequestUri());
        $paths = explode('/', UrlManagement::getRequestUri());
        self::executeController('controllers/' . self::refactorName($paths[1]). 'Controller');
    }
} 