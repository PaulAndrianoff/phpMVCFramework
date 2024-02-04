<?php
return [
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => 'utf8mb4',
    'collation' => $_ENV['DB_CHARSET'],
    // Additional database settings...
];
