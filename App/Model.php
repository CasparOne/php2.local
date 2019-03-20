<?php

namespace App;

/**
 * Class Model
 * @package App
 */
abstract class Model
{
    /**
     * @var null
     */
    protected static $table = null;

    /**
     * @var
     */
    public $id;

    /**
     * @return array|bool
     */
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY created desc';
        return $db->query($sql, [], static::class);
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);
        return (empty($res)) ? false : $res[0];
    }

}
