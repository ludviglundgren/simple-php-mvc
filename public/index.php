<?php

require '../App/Controllers/Posts.php';

require '../Core/Router.php';

$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

/* echo '<pre>';
    // var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
        var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "Route not found for URL '$url'";
} */
$router->dispatch($_SERVER['QUERY_STRING']);