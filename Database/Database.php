<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    protected PDO $pdo;
    public function __construct(
        protected string $host,
        protected int $port,
        protected string $dbname,
        protected string $charset,
        protected string $username,
        protected string $password)
    {
        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        try {
            $dsn = http_build_query([
                'host' => $this->host,
                'port' => $this->port,
                'dbname' => $this->dbname,
                'charset' => $this->charset,
            ], '', ';');

            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset";

            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }

    public function query($query, $prams = [])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($prams);

        return $statement;
    }
}
