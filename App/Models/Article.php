<?php

namespace App\Models;


use App\Db;
use App\Model;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    /**
     * @var string
     */
    protected static $table = 'articles';

    /**
     * @var $author_id
     */
    protected $author_id;

    /**
     * @var $title
     */
    public $title;

    /**
     * @var $text
     */
    public $text;

    /**
     * @var $created
     */
    public $created;

    /**
     * @param $count
     * @return array
     */
    public static function findLastRecord($count) : array
    {
        $sql = 'SELECT * FROM ' . static::$table .  ' ORDER BY created ASC LIMIT ' . $count;
        $db = new Db();
        return $db->query($sql, [],static::class);
    }

    /**
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        if ('author' === $name && !empty($this->author_id) ) {
            $result = Author::findById($this->author_id);

            return $result ?? false;
        }
        return false;
    }

    /**
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value) : void
    {
        if ('author' === $name && $value instanceof Author) {
            $this->author_id = $value->id;
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name) : bool
    {
        if ('author' === $name) {
            return isset($this->author_id);
        }
        return false;
    }

}

