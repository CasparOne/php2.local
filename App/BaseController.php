<?php


namespace App;


abstract class BaseController
{
    /**
     * @var View
     */
    protected $view;
    protected $router;

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
     * @return void|mixed
     */
    public function dispatch(): void
    {
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

    public function setParam($param)
    {
        return $this;
    }
}