<?php

namespace Engine;

use Engine\DI\DI;

//контроллер cms все остальные контроллеры будут его наследовать
//и при наследовании они будут получать все зависимости
//во всех остальных контроллерах мы можем использовать сервисы которые мы подключаем

abstract class Controller
{
   protected $di;

   protected $db;

   //передаем в переменную ди объект ди контейнера
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

}