<?php

use classes\DogArray;
use interfaces\DogArrayInterface;
use models\Dog;
use models\DogGroup;


class Group extends DogArray
{


    public function findDog(array $query)
    {
    }
}


/**
 * Клиент: создается огромнейшая база собак со свойствами каждой: порода, изображение, цвет, имя, собственник, возраст
 */
