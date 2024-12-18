<?php
class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = require '../app/Config/config.php';
        try {
            $dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
            $this->connection = new PDO($dsn, $config['db_user'], $config['db_pass']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
