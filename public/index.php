<?php

require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$routes = include __DIR__ . '/../routes/web.php';

foreach ($routes as $methodPath => $action) {
    [$method, $path] = explode(' ', $methodPath);
    [$controller, $action] = explode('@', $action);

    $router->match($method, $path, function () use ($controller, $action) {
        $controller = new $controller();
        return $controller->{$action}();
    });
}

return $router->run();
