<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\helpers\SessionHelper;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Adjust the request URI to account for subdirectory
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Remove the subdirectory part from the request URI
$path = preg_replace('/^' . preg_quote(str_replace('/public', '', dirname($scriptName)), '/') . '/', '', $requestUri);
$path = str_replace('/public', '', $path);

SessionHelper::start();

// Load the routes
$router = require_once __DIR__ . '/../app/routes.php';

$router->run($path);