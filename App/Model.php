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

    /**
     * @return bool
     */
    public function isNew() : bool
    {
        return null === $this->id;
    }

    /**
     * Inserts new record in database
     */
    protected function insert() : bool
    {
        $fields = get_object_vars($this);
        $cols = [];
        $binds = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if (in_array($name, ['id','created']) ) {
                continue;
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' ('.
            implode(', ', $cols) .') VALUES (' .
            implode(', ', $binds) .')';

        $db = new Db();

        if (true === $db->execute($sql, $data)) {
            $this->id = $db->lastInsertId();
            return true;
        }
        return false;

    }

    /**
     * @return bool
     */
    protected function update() : bool
    {

        $fields = get_object_vars($this);
        $string = [];

        foreach ($fields as $name => $value) {
            if (in_array($name, ['id','created'])) {
                continue;
            }
            $string[] = $name . '=\'' . ':' . $name . '\'';
        }
        var_dump($string);
        $sql = 'UPDATE ' . static::$table . implode(', ',$string) . ' SET ' . ' WHERE id = :id ';

        $db = new Db();
        return $db->execute($sql, [':id' => $this->id]);

    }

    /**
     * @return bool
     */
    public function save() : bool
    {
        if (isset($this->id)) {
            return $this->update();
        }
        return $this->insert();

    }

    /**
     * @return bool
     */
    public function delete() : bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE \'id\' = :id';

        return $db->execute($sql, [':id' => $this->id]);
    }

}
