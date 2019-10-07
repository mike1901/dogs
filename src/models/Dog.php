<?php

namespace models;

/**
 * Class Dog
 * @package models
 */
class Dog
{
    public $name;
    public $age;
    public $owner;

    private $group;

    /**
     * Dog constructor.
     * @param string $name
     * @param string $age
     * @param string $owner
     * @param DogGroup $group
     */
    public function __construct(string $name, string $age, string $owner, DogGroup $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->group = $group;
    }

    public function render()
    {
        $this->group->profile($this->name, $this->age, $this->owner);
    }
}