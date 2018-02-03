<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{

    public $serviceName = "router";

    /**инициализация нового сервиса в ди контейнер,т.е инициализация базы данных
     * @return mixed|void
     */
    public function init() {

        $router = new Router('http://site.local2/');

        //добавляем в ди контейнер новый сервис
        $this->di->set($this->serviceName, $router);
    }
}