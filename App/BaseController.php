<?php


namespace App;


abstract class BaseController
{
    /**
     * @var View
     */
    protected $view;
    protected $params;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return mixed
     */
    abstract protected function action();

    /**
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    /**
     * @param string $params
     */
    public function dispatch($params = ''): void
    {
        $this->params = $params ?? null;
        if ($this->access()) {
            $this->action();
        }
        else {
            die('Доступ закрыт');
        }
    }

    /**
     * @param string $uri
     */
    protected static function redirect(string $uri): void
    {
        header('Location:' . $uri);
        return;
    }

}