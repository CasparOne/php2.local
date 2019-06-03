<?php
require __DIR__ . '/autoload.php';
$router = new \App\Router();
$router->add('/', ['controller' => \App\Controllers\Index::class, 'action' => 'dispatch',]);
$router->add('/article/{id}', ['controller' => \App\Controllers\Article::class, 'action' => 'dispatch',]);
$router->run();
