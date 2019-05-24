<?php
require __DIR__ . '/../autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

/**
 * @var $class string
 * @var $ctrl \App\BaseController
 */

$name =  !empty($parts[1]) ? ucfirst($parts[1]) : 'Index';
$class = '\App\Controllers\Admin\\' . $name;

if (!class_exists($class)) {
    \App\Controllers\Error404::getError();
} else {
    $ctrl = new $class;
    $ctrl->dispatch();
}