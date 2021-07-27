<?php

namespace Helper;

class PdoConnexion
{
    private static $conn = null;

    private function __construct()
    {
        if (\is_null(self::$conn)) {
            // instantiate PDO connexion
            try {
                self::$conn = new \PDO('pgsql:host=web-pgsql;dbname=db;port=5432', 'root','root');
                self::$conn->exec("SET NAMES UTF8");
            } catch (\PDOException $exception) {
                die($exception->getMessage());
            }
        }

        return self::$conn;
    }
}