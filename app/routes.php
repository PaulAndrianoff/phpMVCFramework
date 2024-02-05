<?php

use core\Router;

use app\controllers\AccountController;
use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\controllers\UsersController;

$router = new Router();

$router->add('/', ['controller' => HomeController::class, 'action' => 'index', 'groups' => []]); // Default route
$router->add('/users', ['controller' => UsersController::class, 'action' => 'index', 'groups' => ['client']]);
$router->add('users/{id}', ['controller' => UsersController::class, 'action' => 'searchById', 'groups' => ['client']]);

// Login/Register/Logout
$router->add('/login', ['controller' => AccountController::class, 'action' => 'login', 'groups' => []]);
$router->add('/logout', ['controller' => AccountController::class, 'action' => 'logOut', 'groups' => ['client']]);
$router->add('/register', ['controller' => AccountController::class, 'action' => 'register', 'groups' => []]);

$router->add('/dashboard', ['controller' => DashboardController::class, 'action' => 'index', 'groups' => ['client']]);

// Return the router instance
return $router;