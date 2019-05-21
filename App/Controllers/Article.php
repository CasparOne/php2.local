<?php


namespace App\Controllers;


use App\BaseController;
use App\View;

class Article extends BaseController
{

    public function action()
    {
        $view = new View();
        $view->article = \App\Models\Article::findById($_GET['id']);
        echo $view->render(__DIR__ . '/../../template/article.php');

    }
}