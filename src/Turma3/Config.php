<?php

namespace Turma3;

class Config
{
    public $type;
    public $host;
    public $base;
    public $user;
    public $pass;
    public $dsn;

    /**
     * Config constructor.
     *
     * @param String $type
     * @param String $host
     * @param String $base
     * @param String $user
     * @param String $pass
     */
    public function __construct($type, $host, $base, $user, $pass)
    {
        $this->type = $type;
        $this->host = $host;
        $this->base = $base;
        $this->user = $user;
        $this->pass = $pass;
        $this->dsn = "$type:host=$host;dbname=$base";
    }
}
