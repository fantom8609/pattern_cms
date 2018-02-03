<?php
//пути,по оторым мы подключаем сервисы. возвращаются провайдеры по неймспейсам.
// и они потом автоматически инициализируются
return [

    Engine\Service\Database\Provider::class,
    Engine\Service\Router\Provider::class

];