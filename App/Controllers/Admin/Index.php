<?php


namespace App\Controllers\Admin;


use App\Models\Article;
use App\View;

class Index extends BaseAdminController
{

    public function action()
    {
        $view = new View();
        $view->articles = Article::findAll();
        echo $view->render(__DIR__ . '/../../../template/admin.php');
    }
}