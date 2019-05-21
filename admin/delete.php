<?php

require __DIR__ . '/../autoload.php';
$ctrl = new \App\Controllers\Admin\Delete();
$ctrl->action();

header('Location:' . '/admin/');