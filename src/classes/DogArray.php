<?php


namespace classes;

use interfaces\DogArrayInterface;
use models\Dog;

/**
 * Class DogArray
 * @package classes
 */
class DogArray implements DogArrayInterface
{
    protected $dogArray;
    protected $dogs = [];

    /**
     * DogArray constructor.
     * @param DogArrayInterface $dogArray
     */
    public function __construct(DogArrayInterface $dogArray)
    {
        $this->dogArray = $dogArray;
    }

    /**
     * @return mixed
     */
    public function fill()
    {
        return $this->dogArray->fill();
    }

    /**
     * @param $name
     * @param $age
     * @param $owner
     * @param $group
     */
    public function newDog($name, $age, $owner, $group)
    {
        $this->dogs[] = new Dog($name, $age, $owner, $group);
    }
}