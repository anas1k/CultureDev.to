<?php

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Connection
{

    protected function connect()
    {
        $host = $_ENV['DB_SERVERNAME'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_USERPASSWORD'];
        $db = $_ENV['DB_DATABASE'];

        try {
            $connection = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            $pdo = new PDO($connection, $user, $password);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
