<?php

namespace models;

/**
 * Class DogGroup
 *
 * @package models
 */
class DogGroup extends Model
{
    public $breed;
    public $color;

    /**
     * DogGroup constructor.
     *
     * @param string $breed
     * @param string $color
     */
    public function __construct(string $breed, string $color)
    {
        $this->breed = $breed;
        $this->color = $color;
    }
}