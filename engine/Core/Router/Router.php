<?php

namespace Engine\Core\Router;


class Router
{
    /**
     * @var array список всех роутов
     */
    private $routes = [];

    /**
     * @var
     */
    private $host;
    /**
     * @var
     */
    private $dispatcher;
//в переменную хост будем записывать параметр,который передан в конструктор
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**функция для добавления роутов
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     */
    public function add($key, $pattern, $controller, $method = "GET") {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch($method, $uri) {

    }

    public function getDispatcher () {

        if($this->dispatcher == null) {

        }

        return $this->dispatcher;
    }

}