<?php

namespace Engine\Service;


abstract class AbstractProvider
{
    /**
     * @var \Engine\DI\DI; Хранит экземпляр класса DI
     */
    protected $di;

    /**
     * AbstractProvider constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        //то что примет конструктор кидаем в di
        $this->di = $di;
    }

    /**
     * @return mixed инициализация нового сервиса. без этого создание сервисного правайдера не имеет смысла.
     */
    abstract function init();

}