<?php


namespace App;

/**
 * Class Config
 * @package App
 */
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
    protected function __construct()
    {
        $configPath = __DIR__ . '/../etc/config.php';
        if (is_readable($configPath)) {
            $this->data = include $configPath;
        }
        else {
            die('Config file is wrong or corrupt');
        }
    }

    /**
     * @return Config
     */
    public static function getInstance(): Config
    {
        if (is_null(self::$instance)) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

}
