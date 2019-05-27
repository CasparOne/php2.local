<?php


namespace App\Controllers;


use App\BaseController;

class Article extends BaseController
{

    protected function action()
    {
        $id = $this->router->getParameter()['id'];
        $this->view->article = \App\Models\Article::findById($id);
        echo $this->view->render(__DIR__ . '/../../template/article.php');

    }

    public function setParam($param)
    {
        $this->router = $param;
        return $this;
    }
}