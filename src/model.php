<?php

use classes\DogArray;
use interfaces\DogArrayInterface;
use models\Dog;
use models\DogGroup;


class Group extends DogArray
{
    private $groups = [];

    public function fill(string $name, string $age, string $owner, string $breed, string $image, string $color)
    {
        $group = $this->getGroup($breed, $image, $color);
        $this->newDog($name, $age, $owner, $group);
    }


    public function getGroup(string $breed, string $image, string $color)
    {
        $key = 'key_' . $breed . $image . $color;
        if (!isset($this->groups[$key])) {
            $this->groups[$key] = new DogGroup($breed, $image, $color);
        }
        return $this->groups[$key];
    }

    public function findDog(array $query)
    {
    }
}


/**
 * Клиент: создается огромнейшая база собак со свойствами каждой: порода, изображение, цвет, имя, собственник, возраст
 */
