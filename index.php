<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View();
$view->assign('articles', Article::findLastRecord(4))
    ->display(__DIR__ . '/template/index.php');
