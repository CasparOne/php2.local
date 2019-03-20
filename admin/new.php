<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if ( isset($_GET['id']) && !empty($_GET['id']) ) {
    header('Location:/admin/update.php?id=' . $_GET['id']);
    exit();
}

if ( isset($_POST['title'], $_POST['text'], $_POST['author'] ) ) {

    $article = new Article();
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->author = $_POST['author'];

    $article->save();
    header('Location:/admin/');
    exit();
}