<?php

namespace providers;

use models\Dog;
use models\DogGroup;

/**
 * Class DogCsv
 *
 * @package providers
 */
class DogCsv extends DogProvider
{
    private $file;
    private $rows = [];

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Парсим CSV
     */
    public function load()
    {
        $lines = file($this->file, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $value) {
            $this->rows[] = str_getcsv($value, ';');
        }
    }

    /**
     * @return mixed|void
     */
    public function fill()
    {
        $this->load();
        if (!empty($this->rows)) {
            foreach ($this->rows as $row) {
                list($name, $age, $owner, $breed, $image, $color) = $row;
                $this->newDog($name, $age, $owner, $breed, $image, $color);
            }
        }
    }
}