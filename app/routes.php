<?php

use core\Router;

use app\controllers\AccountController;
use app\controllers\HomeController;
use app\controllers\UsersController;

$router = new Router();

$router->add('/', ['controller' => HomeController::class, 'action' => 'index']); // Default route
$router->add('/users', ['controller' => UsersController::class, 'action' => 'index']);
$router->add('users/{id}', ['controller' => UsersController::class, 'action' => 'searchById']);

// Login/Register/Logout
$router->add('/login', ['controller' => AccountController::class, 'action' => 'login']);
$router->add('/register', ['controller' => AccountController::class, 'action' => 'register']);

// Return the router instance
return $router;