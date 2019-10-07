<?php

namespace models;

/**
 * Class Model
 *
 * @package models
 */
class Model
{
    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($name)
    {
        /**
         * Проверим свойство
         */
        if (in_array($name, $this->attributes())) {
            return $this->{$name};
        }

        /**
         * Вдруг есть метод на это свойство
         */
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        throw new \Exception("Attribute '{$name}'' not found in model: " . get_class($this));
    }

    /**
     * @return array
     */
    public function attributes(): ?array
    {
        return get_class_vars($this) ?? [];
    }

    /**
     * @param array $query
     * @return Model
     */
    public static function findOne(array $query)
    {
        return new self();
    }
}
