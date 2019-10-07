<?php

namespace providers;

use classes\DogArray;
use models\DogGroup;

/**
 * Class DogCsv
 *
 * @package providers
 */
class DogCsv extends DogArray
{
    private $rows = [];

    /**
     * @param string $csv
     */
    public function load($csv = '')
    {
        $this->rows = file_get_contents($csv);
    }

    public function fill()
    {
        if (!empty($this->rows)) {
            foreach ($this->rows as $row) {
                list($name, $age, $owner, $breed, $image, $color) = $row;
                $this->newDog($name, $age, $owner, $breed, $image, $color);
            }
        }
    }

    /**
     * @param string $breed
     * @param string $color
     * @return DogGroup
     */
    public function getGroup(string $breed, string $color): DogGroup
    {

    }
}