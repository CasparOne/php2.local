<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articles = Article::findLastRecord(2);
include __DIR__ . '/template/index.php';
