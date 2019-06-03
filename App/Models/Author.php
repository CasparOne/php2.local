<?php


namespace App\Models;


use App\Model;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    /**
     * @var string
     */
    protected static $table = 'authors';

    /**
     * @var $first_name
     */
    public $first_name;

    /**
     * @var $last_name
     */
    public $last_name;
    /**
     * @var $nick_name
     */
    public $nick_name;

}