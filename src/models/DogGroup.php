<?php


namespace models;

/**
 * Class DogGroup
 * @package models
 */
class DogGroup
{
    public $breed;
    public $image;
    public $color;

    /**
     * DogGroup constructor.
     * @param string $breed
     * @param string $image
     * @param string $color
     */
    public function __construct(string $breed, string $image, string $color)
    {
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;
    }

    /**
     * @param string $name
     * @param string $age
     * @param string $owner
     */
    public function profile(string $name, string $age, string $owner)
    {
        // Show info about one dog
    }
}