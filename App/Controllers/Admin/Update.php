<?php


namespace App\Controllers\Admin;


use App\Models\Article;

/**
 * Class Update
 * @package App\Controllers\Admin
 */
class Update extends BaseAdminController
{
    /**
     * @return mixed|void
     */
    protected function action()
    {
        $article = new Article();
        if (isset($_GET) && !empty($_GET['id'])) {
            $article = Article::findById($_POST['id']);
        }
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->author = $_POST['author'];
        $article->save();
    }
}
