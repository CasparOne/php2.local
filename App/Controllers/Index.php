<?php


namespace App\Controllers;


use App\BaseController;
use App\Models\Article;
use App\View;

class Index extends BaseController
{

    protected function action()
    {
        $this->view = new View();
        $this->view->articles = Article::findAll();
        echo $this->view->render(__DIR__ . '/../../template/index.php');
    }
}