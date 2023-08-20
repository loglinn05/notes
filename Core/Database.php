<?php

namespace Core;

use PDO;

// Connect to the database and execute a query
class Database {
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        if ($this->statement->execute($params)) {
            return $this;
        } else {
            return false;
        }
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!is_array($result)) {
            abort();
        }

        return $result;
    }

    public function all()
    {
        return $this->statement->fetchAll();
    }
}