<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();

$webRoutes = include __DIR__ . '/../routes/web.php';
$apiRoutes = include __DIR__ . '/../routes/api.php';

foreach (array_merge($webRoutes, $apiRoutes) as $methodPath => $action) {
    addRoute($methodPath, $action, $router);
}

function addRoute($methodPath, $action, $router) {
    [$method, $path] = explode(' ', $methodPath);
    [$controller, $action] = explode('@', $action);

    $router->match($method, $path, function () use ($controller, $action) {
        $controller = new $controller();
        try {
            return $controller->{$action}();
        } catch (\Throwable $th) {
            dd($th);
        }
    });
} 

return $router->run();
