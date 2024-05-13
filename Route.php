<?php

use controllers\CreateOrderController;
use controllers\OrderController;
use controllers\ShowOrderController;

require 'controllers/CreateOrderController.php';
require 'controllers/OrderController.php';
require 'controllers/ShowOrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
'/' => [CreateOrderController::class, 'loadView'],
'/createProduct' => [CreateOrderController::class, 'createProduct'],
'/storeOrder' => [CreateOrderController::class, 'storeOrder'],
'/show' => [OrderController::class, 'loadView'],
'/showOrder' => [ShowOrderController::class, 'loadView'],

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