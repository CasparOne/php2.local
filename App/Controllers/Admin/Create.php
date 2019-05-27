<?php


namespace App\Controllers\Admin;


use App\Models\Article;

class Create extends BaseAdminController
{
    /**
     * @return bool
     */
    protected function action(): bool
    {
        if (!empty($_POST['title'])
            && !empty($_POST['text'])) {
            $article = new Article();
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            return $article->save();
        }
        return false;
    }

}