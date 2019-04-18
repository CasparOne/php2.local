<?php


namespace App;

/**
 * Class View
 * @package App
 */
abstract class View
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
    }

    /**
     * @param $template
     */
    public function display($template)
    {
    }

}
