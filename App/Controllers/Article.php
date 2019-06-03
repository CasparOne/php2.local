<?php


namespace App\Controllers;


use App\BaseController;

/**
 * Class Article
 * @package App\Controllers
 */
class Article extends BaseController
{
    /**
     * @return mixed|void
     */
    protected function action()
    {
        $id = reset($this->params['id']);
        $this->view->article = \App\Models\Article::findById($id);
        echo $this->view->render(__DIR__ . '/../../template/article.php');

    }
}