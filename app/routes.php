<?php

use core\Router;

use app\controllers\AccountController;
use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\controllers\UsersController;
use app\controllers\PostController;

$router = new Router();

$router->add('/', ['controller' => HomeController::class, 'action' => 'index', 'name' => 'home']); // Default route
$router->add('/articles', ['controller' => PostController::class, 'action' => 'index', 'name' => 'home']);
$router->add('/articles/{id}', ['controller' => PostController::class, 'action' => 'searchById', 'name' => 'home']);
$router->add('/users', ['controller' => UsersController::class, 'action' => 'index', 'name' => 'dashboard']);
$router->add('users/{id}', ['controller' => UsersController::class, 'action' => 'searchById', 'name' => 'dashboard']);

// Login/Register/Logout
$router->add('/login', ['controller' => AccountController::class, 'action' => 'login', 'name' => 'login']);
$router->add('/logout', ['controller' => AccountController::class, 'action' => 'logOut', 'name' => 'dashboard']);
$router->add('/register', ['controller' => AccountController::class, 'action' => 'register', 'name' => 'login']);

$router->add('/dashboard', ['controller' => DashboardController::class, 'action' => 'index', 'name' => 'dashboard']);
$router->add('/dashboard/edit/{table}', ['controller' => DashboardController::class, 'action' => 'editTable', 'name' => 'dashboard']);
$router->add('/dashboard/new/{table}', ['controller' => DashboardController::class, 'action' => 'newItem', 'name' => 'dashboard']);
$router->add('/dashboard/edit/{table}/{id}', ['controller' => DashboardController::class, 'action' => 'editItem', 'name' => 'dashboard']);
$router->add('/dashboard/delete/{table}/{id}', ['controller' => DashboardController::class, 'action' => 'deleteItem', 'name' => 'dashboard']);

// Return the router instance
return $router;