<?php


namespace App\Controllers;

use App\BaseController;

/**
 * Class Error404
 * @package App\Controllers
 */
class Error404 extends BaseController
{
    /**
     * @return mixed|void
     */
    protected function action()
    {
        echo $this->view->render(__DIR__ . '/../../template/404.php');
    }

    /**
     * @return void
     */
    public static function getError()
    {
        $error = new static();
        $error->action();
        return;
    }

}