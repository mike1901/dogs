<?php

namespace app;

use classes\DogArray;
use interfaces\DogArrayInterface;

class Application
{
    /**
     * Автозагрузка классов
     */
    public static function init()
    {
        spl_autoload_register(function ($name) {
            $className = APP . '/' . str_replace('\\', '/', $name) . '.php';
            if (!file_exists($className)) {
                throw new \Exception("Невозможно загрузить $className");
            }
            include_once($className);
        });
    }

    /**
     * @param DogArrayInterface $client
     * @return DogArray
     */
    public static function run($client)
    {
        return new DogArray($client);
    }
}