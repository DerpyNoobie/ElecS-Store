<?php

class App
{
    public static function init()
    {
        $url = self::parseUrl();

        // Kiểm tra và thiết lập Controller
        $controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $controllerFile = "../app/Controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            $action = isset($url[1]) ? $url[1] : 'index';
            if (method_exists($controller, $action)) {
                call_user_func_array([$controller, $action], array_slice($url, 2));
            } else {
                die("Action not found");
            }
        } else {
            die("Controller not found");
        }
    }

    private static function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
