<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';


if (isset($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    include __DIR__ . '/template/update.php';
}

if (isset($_POST['id'])) {

    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->author = $_POST['author'];

    header('Location:/admin.php');
    exit();
}

