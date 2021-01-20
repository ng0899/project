<?php


class Router
{
    /**
     * table of routers
     * @var array
     */
    public static $routers = [];

    /**
     * Current route
     * @var array
     */
    public static $route = [];

    /**
     * Add route in table of routers
     * @param $route
     */
    public static function add($route)
    {
        foreach ($route as $k => $val){
            self::$routers[$k] = $val;
        }
    }

    /**
     * Chech URL for the routers table
     *
     * @param $url - адресная строка
     * @return bool
     */
    public static function checkRoute($url)
    {
        foreach(self::$routers as $k => $val){
            if(preg_match("#$k#i", $url, $matches)){
                //pr($val);
                $route = $val;
                foreach($matches as $key => $match){
                    if(is_string($key)){
                        $route[$key] = $match;
                    }
                }

                $route['controller'] = self::uStr($route['controller']);
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }

        return false;
    }

    public static function dispatch($path)
    {
        if(self::checkRoute($path)){
            $controller = '\app\controllers\\' . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $obj = new $controller;
            }else{
                echo 'Контроллер ' . $controller . ' не найден';
            }
        }else{
            echo '404';
        }
    }

    /**
     * Make right string for the controller name
     * @param $str - name of class or method
     * @return mixed|string
     */
    private static function uStr($str)
    {
        $str = str_replace('-', ' ', $str);
        $str = ucwords($str);
        $str = str_replace(' ', '', $str);
        return $str;
    }
}