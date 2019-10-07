<?php

namespace classes;

use models\Model;

/**
 * Class Render
 *
 * @package classes
 */
class Render
{
    /**
     * @param Model $model
     */
    public static function render(Model $model)
    {
        var_export($model);
    }
}