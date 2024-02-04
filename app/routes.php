<?php

use core\Router;
use app\controllers\HomeController;
use app\controllers\UsersController;

$router = new Router();

$router->add('/', ['controller' => HomeController::class, 'action' => 'index']); // Default route
$router->add('/users', ['controller' => UsersController::class, 'action' => 'index']); // Specific route
$router->add('users/{id}', ['controller' => UsersController::class, 'action' => 'searchById']);

// Return the router instance
return $router;