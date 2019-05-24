<?php


namespace App\Controllers\Admin;


use App\Models\Article;

class Delete extends BaseAdminController
{

    protected function action()
    {
        $id = $_GET['id'];

        if (!isset($id) || empty($id)) {
            static::redirect($this->redirectUri);
        }

        $article = Article::findById($id);
        if (false !== $article) {
            $article->delete();
            static::redirect($this->redirectUri);
        }
    }
}