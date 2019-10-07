<?php

namespace models;

/**
 * Class Dog
 *
 * @package models
 */
class Dog extends Model
{
    public $name;
    public $age;
    public $owner;
    public $image;
    private $group;

    /**
     * Dog constructor.
     *
     * @param string $name
     * @param string $age
     * @param string $owner
     * @param string $image
     */
    public function __construct(string $name, string $age, string $owner, string $image)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->image = $image;
    }

    /**
     * @param DogGroup $group
     */
    public function setGroup(DogGroup $group)
    {
        $this->group = $group;
    }

    /**
     * @param array $query
     * @return Model
     */
    public static function findDog(array $query)
    {
        return self::findOne($query);
    }
}