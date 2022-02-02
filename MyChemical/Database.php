<?php

require_once 'config.php';

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }


    //łączenie z bazą danych
    public function connect()
    {
        //blok try by sprawdzić czy łączenia przebiega poprawnie
        //łapanie błędu  z biblioteki PDO

        try {
            //tworzenie nowego obiektu PDO i przekazywanie mu parametrów dzięki którym łączymy się z bazą
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"  => "prefer"] //ustawiamy opcjonalny klucz
            );

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; //zwracamy to połączenie
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

}