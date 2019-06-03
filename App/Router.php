<?php


namespace App;


class Router
{
    private $routes = [];
    protected $uri;

    public function __construct()
    {
        $this->url = $this->cleanUri();
        $this->routes = $this->unWrapRoutes();

    }

    /**
     * @param $route
     * @param array $params
     */
    public function add($route, $params = [])
    {
        $this->routes = array_replace_recursive($this->routes, [$route => $params]);
    }

    /**
     * The main function
     */
    public function run()
    {
        $param = $this->getRequestParams();
        $controllerName = $this->getControllerName();
        $controller = new $controllerName;
        $controller->dispatch($param);
    }

    /**
     * Returns Request parameter
     * @return string
     */
    protected function getRequestParams()
    {
        $controller = $this->getControllerName();
        $flippedRoutes = [];

        foreach ($this->routes as $key => $value) {
            $flippedRoutes[$value['controller']] = $key;
        }
        $route = $flippedRoutes[$controller];

        preg_match_all('~(?:{.+})~', $route, $paramName);
        foreach ($paramName as $key => $value) {
            $paramName[$key] = str_replace(['{', '}'],['',''], $value[array_key_first($value)]);
        }

        $regExpr = '~' . $route . '~J';
        foreach ($paramName as $paramNameValue) {
            $regExpr = str_replace($paramNameValue, '(?P<' . $paramNameValue . '>.+)', $regExpr);
            $regExpr = str_replace(['/', '{', '}'], ['\/', '',''], $regExpr);
        }
        preg_match_all($regExpr, $this->url, $paramValue);
        return $paramValue;
    }

    /**
     * Returns Controller class name
     *
     * @return bool|int|string
     */
    protected function getControllerName()
    {
        $regExpressions = [];
        foreach ($this->routes as  $route => $params) {
            $route = preg_replace('~\/$~','', $route);
            $route = str_replace('/', '\/', $route );
            $route = preg_replace('~\{.+\}~', '.+$', $route);
            $regExpressions[$params['controller']] = '~^' . $route . '$~';
        }

        foreach ($regExpressions as $className => $regExpression) {
            if (1 === preg_match($regExpression, $this->url)) {
                return $className;
            }
        }
        return false;

    }

    /**
     * Truncated request string
     *
     * @return string
     */
    protected function cleanUri() : string
    {
        $uri = $_SERVER['REQUEST_URI'];
        return preg_replace('~\/*$~','', $uri);
    }

    /**
     * Makes uri more readable and clearly
     * @return array
     */
    protected function unWrapRoutes() : array
    {
        $routes = [];
        foreach (Config::getInstance()->data['routes'] as $key => $value) {
            $routes[$key] = [
                'controller' => $value,
                'action' => 'dispatch',
            ];
        }
        return $routes;
    }

}