<?php

namespace App;

use PDO;

class Database
{
    protected $pdo;

    public function __construct()
    {
        $dbconfig = parse_ini_file(".env");

        $host = $dbconfig["DB_NAME"];
        $user = $dbconfig["DB_USER"];
        $password = $dbconfig["DB_PASSWORD"];
        $this->pdo = new PDO($host, $user, $password);
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
