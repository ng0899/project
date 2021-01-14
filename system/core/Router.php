<?php


class Router
{
    public static $routers = [];
    public $rout;

    public function __construct()
    {
        //echo 'Router';
    }

    public static function getRouts($pattern, $path)
    {
        self::$routers[$pattern] = $path;
        self::dispatch($path);
    }

    public static function dispatch($path)
    {
        foreach (self::$routers as $pattern => $item){
            preg_match("#".$pattern."#", $item, $matches);
        }
        pr($matches);
    }
}