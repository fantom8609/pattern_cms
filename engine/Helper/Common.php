<?php

namespace Engine\Helper;

//класс для вспомогательных функций

class Common
{
    /**
     * @return bool
     */
    function isPost() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public static function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool|string
     */
    public static function getPathUri() {

        $pathUri = $_SERVER['REQUEST_URI'];
        //есть ли гет параметры в урл
        //т.к гет параметры передаются после знака вопроса,если такой символ будет найден
        //функция вернет номер позиции символа от нуля
        if($position = strpos($pathUri, '?')) {
            //то мы будем обрезать строку с нулевого символа (отсекать гет параметр)
            $pathUri = substr($pathUri, 0,$position);
        }
        return $pathUri;
    }

}