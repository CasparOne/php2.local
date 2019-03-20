<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articles = Article::findLastRecord(4);
include __DIR__ . '/template/index.php';
