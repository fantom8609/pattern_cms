<?php

namespace Engine\Service\Router;


class UrlDispatcher
{
    private $method = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET' => [],
        'POST' => []
    ];
//паттерн для передаччи сегментов
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function addPattern($key, $pattern) {

        $this->patterns[$key] = $pattern;
    }

    public function routes($method) {
        return isset($this->routes[$method]) ? $this->routes[$method]: [];
    }
//получаем роуты определенного метода
    public function dispatch ($method, $uri) {

        $routes = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routes)) {
            //в параметр попадает какой то ключ т.е кокой то контроллер
            return new DispatchedRoute($routes[$uri]);
        }
    }

}