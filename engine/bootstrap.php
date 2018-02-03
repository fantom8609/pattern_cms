<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try {
    //Dependency injection
    //все зависимости,которые в ди контейнере попадают в нашу cms
    $di = new DI();


    //устанавливаем зависимости
    /*$di->set('test', ['db' => 'db_object']);
    $di->set('test2', ['mail' => 'mail_object']);*/

    //подключаем массив с сервисами
    $services = require __DIR__ . '/Config/Service.php';

    //проходим по массиву из конфига $service это имя класса и создаем экземпляры
    foreach ($services as $service) {
        $provider = new $service($di);
        //после каждого прохода цикла у нас создается экземпляр сервиса
        //инициализируем сервис
        $provider->init();
    }


    //в Cms попадает ди контейнер(объект) т.е все зависимости
    $cms = new Cms($di);

    $cms->run();

} catch (\ErrorException $e) {
    echo $e->getMessage();
}