<?php

use controllers\CreateOrderController;

require 'controllers/CreateOrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
'/' => [CreateOrderController::class, 'loadview'],
'/createProduct' => [CreateOrderController::class, 'createProduct'],
'/storeOrder' => [CreateOrderController::class, 'storeOrder'],

];

if (array_key_exists($uri, $routes)) {
$controller = $routes[$uri];
if (is_array($controller)) {
$controllerInstance = new $controller[0]();
$method = $controller[1];
$controllerInstance->$method();
} else {
new $controller();
}
} else {
abort();
}