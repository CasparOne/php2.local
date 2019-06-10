<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if ( isset($_POST['title'], $_POST['text']) ) {

    $article = new Article();
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];

    $article->save();
    header('Location:/admin/');
    exit();
}