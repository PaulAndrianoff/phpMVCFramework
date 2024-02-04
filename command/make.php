#!/usr/bin/env php
<?php

// Autoload your project classes
require 'vendor/autoload.php';

// Command-line arguments
$componentType = $argv[1] ?? null;
$componentName = $argv[2] ?? null;

if (!$componentType || !$componentName) {
    echo "Usage: php make.php [type] [name]\n";
    echo "Types: model, controller\n";
    exit;
}

switch ($componentType) {
    case 'model':
        createModel($componentName);
        break;
    case 'controller':
        createController($componentName);
        break;
    default:
        echo "Unknown component type: $componentType\n";
        break;
}

function createModel($name) {
    $modelTemplate = "<?php\n\nnamespace app\models;\n\nclass $name {\n\n}";
    $filePath = __DIR__ . "../app/models/$name.php";
    file_put_contents($filePath, $modelTemplate);
    echo "Model created at: $filePath\n";
}

function createController($name) {
    $controllerTemplate = "<?php\n\nnamespace app\controllers;\n\nuse core\Controller;\n\nclass $name extends Controller {\n    public function index() {\n        echo 'Hello from the index method in the $name.';\n    }\n}";
    $controllerPath = __DIR__ . "../app/controllers/$name.php";
    file_put_contents($controllerPath, $controllerTemplate);

    // Create a corresponding view
    $viewPath = __DIR__ . "../app/views/" . strtolower($name);
    if (!file_exists($viewPath)) {
        mkdir($viewPath, 0777, true);
    }
    file_put_contents($viewPath . "/index.php", "<h1>Welcome to $name index!</h1>");

    echo "Controller created at: $controllerPath\n";
    echo "View created at: $viewPath/index.php\n";
}

echo "Component creation complete.\n";
