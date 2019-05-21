<?php


namespace App\Controllers\Admin;


use App\Models\Article;

class Delete extends BaseAdminController
{

    public function action()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);

            if (false !== $article) {
                $article->delete();
            }
        }
    }

}