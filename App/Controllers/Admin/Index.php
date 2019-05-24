<?php


namespace App\Controllers\Admin;


use App\Models\Article;

/**
 * Class Index
 * @package App\Controllers\Admin
 */
class Index extends BaseAdminController
{
    /**
     * @return mixed|void
     */
    protected function action()
    {
        $this->view->articles = Article::findAll();
        echo $this->view->render(__DIR__ . '/../../../template/admin.php');
    }
}