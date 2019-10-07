<?php

namespace interfaces;

/**
 * Interface DogArrayInterface
 *
 * @package interfaces
 */
interface DogArrayInterface
{
    /**
     * Заполнение массива
     *
     * @return mixed
     */
    public function fill();

    public function saveOnBase();

    public function render();
}