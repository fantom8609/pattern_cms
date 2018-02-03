<?php

namespace Engine;


class Cms
{
    private $di;

    private $router;

    public function __construct($di)
    {
        $this->di = $di;
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
        $this->router->add('product','/product','ProductController:index');
        echo "<pre>";
        print_r ($this->di);
        echo "</pre>";

    }

}