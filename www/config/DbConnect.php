<?php

class DbConnect
{
    public function db_connect()
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER, DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
            );

        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Connection failed: " . $e->getMessage());
        }
    }
}