<?php
declare(strict_types=1);

class ConnectionProvider
{
    public static function connectDatabase(): mysqli
    {
        $jsonData = json_decode(file_get_contents(__DIR__ . '/account.json'), true);
        $conn = new mysqli(
            $jsonData["host"], 
            $jsonData["name"],
            $jsonData["password"], 
            $jsonData["db"]);
        # добавить try catch
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}