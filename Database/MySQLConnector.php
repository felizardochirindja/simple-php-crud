<?php

class MySQLConnector
{
    private $dsn = 'mysql:host=localhost;dbname=patient_care';
    private $userName = 'root';
    private $password = '';
    private $dataBaseConnection;

    public function __construct()
    {
        try {
            $this->dataBaseConnection = new PDO(
                $this->dsn, $this->userName, $this->password
            );
        } catch (PDOException $pdoException) {
            echo 'Connection failed: ' . $pdoException;
        }
    }

    public function returnConnection()
    {
        return $this->dataBaseConnection;
    }
}
