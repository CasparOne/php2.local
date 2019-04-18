<?php

namespace App;


class Db
{
    /**
     * @var \PDO
     */
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $config = Config::getInstance();
        $dbConfig = $config->data['db'];
        if (is_null($dbConfig)) {
            die('Failed to obtain right parameters'); // this is temporary solution
        }
        $dsn = $dbConfig['engine'] . ':host=' .$dbConfig['host'] .';dbname=' . $dbConfig['dbname'];
        $this->dbh = new \PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string $class
     * @return array
     */
    public function query(string $sql, array $params = [], $class = '')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (empty($class)) {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []) :bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }


}