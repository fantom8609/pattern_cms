<?php

namespace Engine\Service\Database;


use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{

    public $serviceName = "db";


    /**инициализация нового сервиса в ди контейнер,т.е инициализация базы данных
     * @return mixed|void
     */
    public function init() {

        $db = new Connection();

        //добавляем в ди контейнер новый сервис
        $this->di->set($this->serviceName, $db);






    }

}