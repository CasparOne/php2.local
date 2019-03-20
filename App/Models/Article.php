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
    protected static $table = 'article';
    /**
     * @var $title
     */
    public $title;
    /**
     * @var $text
     */
    public $text;
    /**
     * @var $author
     */
    public $author;
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


}