<?php

namespace Engine\Core\Router;


//use Engine\Core\Router\DispatchedRoute;

class UrlDispatcher
{
    /**
     * @var array
     */
    private $method = [
        'GET',
        'POST'
    ];

    /**
     * @var array
     */
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @var array
     */
//паттерн для передаччи сегментов
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    /**
     * @param $key
     * @param $pattern
     */
    public function addPattern($key, $pattern)
    {

        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array|mixed
     */
    public function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }
    /**
     * @param $method
     * @param $pattern
     * @param $controller
     */
    //register routes
    public function register($method, $pattern, $controller)
    {

        $this->routes[$method][$pattern] = $controller;
    }

    /**получает роуты, проверяет и если что создает DispatchedRoute
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {

        //роуты определенного метода
        $routes = $this->routes(strtoupper($method));

//если в этом массиве есть ури
        if (array_key_exists($uri, $routes)) {

            //в параметр попадает какой то ключ т.е какой то контроллер
            return new DispatchedRoute($routes[$uri]);
        }
        //в противном случае
        return $this->doDispatch($method, $uri);
    }

    /**
     * @param $method
     * @param $uri
     */
    public function doDispatch($method, $uri)
    {

//перебираем массив с роутами определенного метода
        foreach ($this->routes($method) as $route => $controller) {

            $pattern = '#^' . $route . '$#s';

//$uri - строка в которой ищем $parameters - то что ищем
            if (preg_match($pattern, $uri, $parameters)) {

                return new DispatchedRoute($controller, $parameters);
            }
        }
    }
}