<?php
namespace Engine\DI;

/**
 * Class DI для хранения зависимостей
 * @package Engine\DI
 */

class DI {
    /**
     * @var array
     */
    //сюда мы будем сохранять зависимости и получать их
    private $container = [];

    /**с помощью этой функции мы будем добавлять зависимости в контейнер
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value) {
        //записываем новый элемент в массив
        $this->container[$key] = $value;
        return $this;
    }

    /**возвращает какую то зависимость по ключу
     * @param $key
     * @return bool
     */
    public function get($key) {
        return $this->has($key);
    }

    /**проверяет есть ли данный ключ в ди контейнере
     * @param $key
     * @return mixed|null
     */
    public function has($key) {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

}
