<?php


namespace App\Controllers\Admin;


use App\Models\Article;

/**
 * Class Edit
 * @package App\Controllers\Admin
 */
class Edit extends BaseAdminController
{
    /**
     * @return mixed|void
     */
    protected function action()
    {
        if (isset($_GET) && !empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);
        }
        echo $this->view->render(__DIR__ . '/../../../template/edit.php');
    }
}
