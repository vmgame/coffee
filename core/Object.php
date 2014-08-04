<?php
/**
 * Created by PhpStorm.
 * User: Bao Chung
 * Date: 8/2/14
 * Time: 6:13 PM
 */

namespace cf\core;

class Object {
    public static function className(){
        var_dump(get_called_class());
    }
}
return __NAMESPACE__;