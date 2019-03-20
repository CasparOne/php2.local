<?php


namespace App;


class Config
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @var
     */
    private static $instance;

    /**
     * Config constructor. Singleton
     */
    private function __construct()
    {
        $this->data = include __DIR__ . '/../etc/config.php';
    }

    /**
     * @return Config
     */
    public static function getInstance() : Config
    {
        if (is_null(self::$instance)) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

}
