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
    protected static $table = 'article';
    public $title;
    public $text;
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


}