<?php


namespace App\Controllers;


use App\BaseController;
use App\Models\Article;
use App\View;

class Index extends BaseController
{

    public function action()
    {
        $view = new View();
        $view->articles = Article::findAll();
        echo $view->render(__DIR__ . '/../../template/index.php');
    }
}