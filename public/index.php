<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust path as necessary

use core\Router;
use app\controllers\HomeController;
use app\controllers\UsersController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$router = new Router();

// Adjust the request URI to account for subdirectory
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Remove the subdirectory part from the request URI
$path = preg_replace('/^' . preg_quote(str_replace('/public', '', dirname($scriptName)), '/') . '/', '', $requestUri);
$path = str_replace('/public', '', $path);

$router->add('/', ['controller' => HomeController::class, 'action' => 'index']); // Default route
$router->add('/users', ['controller' => UsersController::class, 'action' => 'index']); // Specific route
$router->add('users/{id}', ['controller' => UsersController::class, 'action' => 'searchById']);

$router->run($path);