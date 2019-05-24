<?php


namespace App;

/**
 * Class Router
 * @package App
 */
class Router
{
    /**
     * @var array $routes
     * @var array $params
     */
    protected $routes = [];
    protected $params = [];
    protected $curUri;


    /**
     * Router constructor.
     */
    public function __construct()
    {
        $config = Config::getInstance();
        $this->routes = $config->data['routes'];
        $this->curUri = $_SERVER['REQUEST_URI'];
    }

    public function getClassName()
    {
        if (!class_exists($this->findControllerName())) {
            return false; die('Class not found');
        }
        return $this->findControllerName();
    }


    /**
     * @return bool|int|string
     */
    protected function findControllerName()
    {
        $uri = $this->makePureUri($this->curUri);
        $regExp = $this->getRegExpressions();
        foreach ($regExp as $className => $rexExpession) {

            if (1 === preg_match($rexExpession, $uri)) {
                return $className;
            }
        }
        return false;
    }

    /**
     * @return null
     */
    protected function getParameter()
    {
        $config = $this->routes;
        $flipRoutes = array_flip($config);
        $controller = $this->getController();
        $route = $flipRoutes[$controller];

        preg_match_all('#(?:{.+})#U', $route, $parameterNames);

        foreach ($parameterNames as $key => $parameterName) {
            $parameterNames[$key] = str_replace(['{', '}'], '', $parameterName);
        }

        $parameterNames = reset($parameterNames);

        if (!isset($parameterNames)) {
            return null;
        }

        $regExp = '#' . $route . '#J';

        foreach ($parameterNames as $parameterName) {
            $regExp = str_replace($parameterName, sprintf('(?P<%s>.+)', $parameterName), $regExp);
        }
        $regExp = preg_replace(['#^\/#', '#{#', '#}#',],['/','','',], $regExp);

        preg_match_all($regExp, $this->curUri, $parameterValues);

        $result = null;
        foreach ($parameterNames as $parameterName) {
            if (isset($parameterValues[$parameterName])) {
                $result[$parameterName] = reset($parameterValues[$parameterName]);
            }
        }

        return $result;
    }


    /**
     * Makes array of regular expressions from list of routes
     * @return array|null
     */
    protected function getRegExpressions()
    {
        $regExpr = [];
        foreach ($this->routes as $pattern => $className) {
            $result = str_replace('/', '\/',    $pattern);
            $result = preg_replace('#{.+}#','.+', $result);
            if (isset($result)) {
                $regExpr[$className] = '#^' . $result . '$#';
            }
        }
        return $regExpr ?? null;
    }

    /**
     * @param $url
     * @return string
     */
    protected function makePureUri($url)
    {
        if ($url != '') {
            $parts = explode('&', $url,2);
        }

        if (strpos($parts[0], '=') === false) {
            $url = $parts[0];
        } else {
            $url = '';
        }
        return $url;
    }

    /**
     * @param string $string
     * @return mixed
     */
    protected function toStudlyCaps(string $string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * @param string $string
     * @return string
     */
    protected function toCamelCase(string $string)
    {
        return lcfirst($this->toStudlyCaps($string));
    }

}