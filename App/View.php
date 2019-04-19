<?php


namespace App;

/**
 * Class View
 * @package App
 */
class View
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param string $name
     * @param Model $value
     * @return $this
     */
    public function assign(string $name, array $value)
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * @param $template
     * @return boolean
     */
    public function display($template) : bool
    {
        extract($this->data);
        if (is_readable($template)) {
            include $template;
            return true;
        }
        return false;
    }

}
