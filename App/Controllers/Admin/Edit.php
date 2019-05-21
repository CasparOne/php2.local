<?php


namespace App\Controllers\Admin;


use App\Models\Article;
use App\View;

class Edit extends BaseAdminController
{

    public function action()
    {
        $view = new View();

        $this->save();
        if (isset($_GET) && ! empty($_GET['id'])) {
            $view->article = Article::findById($_GET['id']);
        }

        echo $view->render(__DIR__ . '/../../../template/edit.php');

    }

    protected function save()
    {

        if ( isset($_POST['title'], $_POST['text']) ) {

            $article = new Article();
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];

            $article->save();
        }
    }
}