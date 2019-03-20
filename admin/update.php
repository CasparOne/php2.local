<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';


if ( isset($_GET['id']) && !empty($_GET['id']) ) {
    $article = Article::findById($_GET['id']);

    if (!false == $article) {
        include __DIR__ . '/../template/update.php';
    } else {
        header('Location:/admin/create.php');
        exit();
    }

}

if ( isset($_POST['id']) && !empty($_POST['id']) ) {

    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->author = $_POST['author'];

    $article->save();
    header('Location:/admin/');
    exit();
}

