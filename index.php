<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View();
$view->articles =  Article::findLastRecord(4);
echo $view->render(__DIR__ . '/template/index.php');