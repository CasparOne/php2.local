<?php

require __DIR__ . '/../autoload.php';

$ctrl = new \App\Controllers\Admin\Update();
$ctrl->dispatch();

header('Location:/admin/');