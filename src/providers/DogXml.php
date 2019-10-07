<?php

namespace providers;

use models\Dog;
use models\DogGroup;

/**
 * Class DogCsv
 *
 * @package providers
 */
class DogXml extends DogProvider
{
    private $file;
    private $rows = [];

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Парсим XML
     */
    public function load()
    {
        $reader = new \XMLReader();
        $fields = ['name', 'age', 'owner', 'breed', 'image', 'color'];
        $reader->open($this->file);
        while ($reader->read()) {
            if ($reader->name == 'DOG') {
                $r = [];
                foreach ($fields as $field) {
                    $r[] = $reader->getAttribute($field);
                }
                $this->rows[] = $r;
            }
        }
        $reader->close();
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