<?php

namespace Engine\Core\Router;


use Engine\Core\Router\UrlDispatcher;

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
    public function add($key, $pattern, $controller, $method = "GET")
    {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return \Engine\Service\Router\DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
//возвращается объект в котором зарегистрированы наши роуты
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {

        if ($this->dispatcher == null) {

            $this->dispatcher = new UrlDispatcher();

//проходимся по нашим роутам
            foreach ($this->routes as $route) {

//регистрируем роуты
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        //возвращается объект в котором зарегистрированы наши роуты
        return $this->dispatcher;
    }

}