<?php

namespace classes;

use interfaces\DogArrayInterface;
use models\Dog;
use models\DogGroup;

/**
 * Class DogArray
 *
 * @package classes
 */
class DogArray implements DogArrayInterface
{
    protected $dogArray;
    protected $dogs = [];

    /**
     * DogArray constructor.
     *
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
     * @param string $name
     * @param string $age
     * @param string $owner
     * @param string $image
     * @param string $breed
     * @param string $color
     */
    public function newDog(string $name, string $age, string $owner, string $image, string $breed, string $color)
    {
        $dog = new Dog($name, $age, $owner, $image);
        $group = $this->getGroup($breed, $color);
        $dog->setGroup($group);
        $this->dogs[] = $dog;
    }

    /**
     * @param string $breed
     * @param string $color
     * @return \models\DogGroup
     */
    public function getGroup(string $breed, string $color)
    {
        /**
         * DB - класс для работы с БД не стал писать его
         */
        return DogGroup::findOne([
            'breed' => $breed,
            'color' => $color
        ]);
    }
}