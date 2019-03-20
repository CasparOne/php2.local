<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = Article::findById($_GET['id']);

    if (false !== $article) {
        $article->delete();
    }
}

header('Location:' . '/admin/');