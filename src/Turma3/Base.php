<?php
/**
 * Class Base
 *
 * @property Config $config
 */

namespace Turma3;

class Base
{
    public $dbh;

    /**
     * Base constructor.
     *
     * @param mixed $config
     */
    public function __construct($config)
    {
        $this->connect($config->dsn, $config->user, $config->pass);
    }

    /**
     * @param String $dsn
     * @param String $user
     * @param String $pass
     */
    public function connect($dsn, $user, $pass)
    {
        $this->dbh = new \PDO($dsn, $user, $pass);
    }

    /**
     * @param String $sql
     * @return mixed
     */
    public function prepare($sql)
    {
        return $sth = $this->dbh->prepare($sql);
    }


    /**
     * Base destructor.
     */
    public function disconnect()
    {
        $this->dbh = NULL;
    }

}
