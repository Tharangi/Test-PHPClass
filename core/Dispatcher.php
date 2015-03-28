<?php namespace Core;

class Dispatcher {

    private static $segments = [];
    private static $current_uri;

    public static function process()
    {
        self::setCurrentUri();
        self::setSegments();
        self::handel();
    }

    public static function getCurrentUri()
    {
        return self::$current_uri;
    }

    public static function segment($index)
    {
        return isset(self::$segments[$index]) ? self::$segments[$index] : null;
    }

    private static function setCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        self::$current_uri = '/' . trim($uri, '/');
    }

    private static function setSegments()
    {
        self::$segments = explode('/', self::$current_uri);
    }

    private static function handel()
    {
        require_once('../app/routes.php');
        $routes_list = unserialize(ROUTES);
        $routes = explode("@", $routes_list[self::$current_uri]);
        $model = "App\\Controllers\\".$routes[0];
        $obj = new $model;
        $obj->{$routes[1]}();
    }

}
