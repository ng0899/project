<?php
error_reporting(E_ALL);
require_once '../system/core/functions.php';

use system\core\Router;
$qStr = $_SERVER['QUERY_STRING'];


define("ROOT", dirname(__DIR__));
define("LAYOUT", 'default');

spl_autoload_register(function($class){
    $class = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($class)){
        include $class;
    }
});


//Router::add(['^(?P<controller>[a-z0-9-]+)/(?P<alias>[a-z0-9-]+)$' => []]);

Router::add(['^$' => ['controller' => 'Main', 'action' => 'index']]);
Router::add(['^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$' => []]);


Router::dispatch($qStr);

pr(\system\core\Db::$queries);



