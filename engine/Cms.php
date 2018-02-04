<?php

namespace Engine;
use Engine\Helper\Common;

//данный класс запускает все приложение

class Cms
{
    private $di;

    private $router;

    //аргумент di созержит все зависимости
    public function __construct($di)
    {
        $this->di = $di;
        //из ди контейнера берем зависимость-роутер(объект) в переменную
        $this->router = $this->di->get('router');
    }

    public function run() {
        //print_r ($this->di);
        //$db = $this->di->get('test');
        //print_r($db);

        //внутри ди контейнера пдо, в котором записан db объект
        //print_r ($this->di);


        //добавление маршрутов в роут
        $this->router->add('home','/','HomeController:index');
        $this->router->add('product','/product/12','ProductController:index');

        /*
        echo "<pre>";
        print_r ($this->router);
        echo "</pre>";*/

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());
        /*echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";*/

        //echo Common::getMethod();

        //print Common::getPathUri();
        echo "<pre>";
        print_r($routerDispatch);
        echo "</pre>";


    }

}