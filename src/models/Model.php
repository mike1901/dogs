<?php

namespace models;

use Exception;

/**
 * Class Model
 *
 * @property array $attributes
 * @package models
 */
class Model
{
    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        /**
         * Проверим свойство
         */
        if (in_array($name, $this->getAttributes())) {
            return $this->{$name};
        }

        /**
         * Вдруг есть метод на это свойство
         */
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        throw new Exception("Attribute '{$name}'' not found in model: " . get_class($this));
    }

    /**
     * @return array
     */
    public function getAttributes(): ?array
    {
        return (array)get_class_vars(get_class($this));
    }

    /**
     * @param array $query
     * @return Model
     */
    public static function findOne(array $query)
    {
        /**
         * В поиске использовать ActiveRecord, Это сильно упростит задачу
         * ActiveRecord::findOne();
         */
        $model = new static();
        foreach ($model->attributes as $key => $value) {
            if (isset($query[$key])) {
                $model->{$key} = $query[$key];
            }
        }
        return $model;
    }

    /**
     * @return array
     */
    public function profile(): ?array
    {
        return ['profile' => $this];
    }
}