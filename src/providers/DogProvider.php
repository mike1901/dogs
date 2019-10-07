<?php

namespace providers;

use Exception;
use interfaces\DogArrayInterface;
use models\Dog;
use models\DogGroup;

class DogProvider implements DogArrayInterface
{
    /**
     * @var array
     */
    public $dogs = [];

    /**
     * @return mixed|void
     * @throws Exception
     */
    public function fill()
    {
        throw new Exception('Method DogProvider::fill не реализован.');
    }

    public function render()
    {
        /** @var Dog $dogModel */
        foreach ($this->dogs as $dogModel) {
            print_r($dogModel->profile());
        }
    }

    /**
     * Сохранение в базу всех собак
     */
    public function saveOnBase(): void
    {
        file_put_contents(APP . '/runtime/' . static::class . 'dogs.json', json_encode($this->dogs));
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
        return DogGroup::findOne([
            'breed' => $breed,
            'color' => $color
        ]);
    }
}