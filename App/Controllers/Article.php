<?php


namespace App\Controllers;


use App\BaseController;
use App\View;

class Article extends BaseController
{

    protected function action()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        echo  $this->view->render(__DIR__ . '/../../template/article.php');

    }
}