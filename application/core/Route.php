<?php

class Route
{
    /**
     * Routing
     */
    static function start()
    {
        $controllerName = 'Main';
        $actionName = 'index';

        $toExplode = explode('?', $_SERVER['REQUEST_URI']);

        $routes = explode('/', $toExplode[0]);
        $params = isset($toExplode[1]) ? $toExplode[1] : null;

        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $controllerName = 'Controller' . ucfirst($controllerName);
        $actionName = $actionName.'Action';

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            if (null != $params) {
                $controller->$action($params);
            } else {
                $controller->$action();
            }
        } else {
            Route::ErrorPage404();
        }
    }


    /**
     * Show 404
     */
   static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}
