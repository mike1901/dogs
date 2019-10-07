<?php

namespace classes;

use interfaces\DogArrayInterface;

/**
 * Class DogArray
 *
 * @package classes
 */
class DogArray implements DogArrayInterface
{
    /**
     * @var DogArrayInterface
     */
    protected $d;

    /**
     * DogArray constructor.
     *
     * @param DogArrayInterface $d
     */
    public function __construct(DogArrayInterface $d)
    {
        $this->d = $d;
    }

    /**
     * Заполнение данных
     *
     * @return mixed
     */
    public function fill()
    {
        return $this->d->fill();
    }

    /**
     * Вывод результата
     */
    public function render()
    {
        $this->d->render();
    }

    /**
     *  Сохранение записей в базу
     */
    public function saveOnBase()
    {
        $this->d->saveOnBase();
    }
}