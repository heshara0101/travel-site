<?php

class Database
{
    private static $instance = null;
    public $DB_CON;

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "travel_site"; // your phpMyAdmin database name

    private function __construct()
    {
        $this->DB_CON = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if (!$this->DB_CON) {
            die("Database Connection Failed: " . mysqli_connect_error());
        }
    }


    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }


    public function readQuery($query)
    {
        return mysqli_query($this->DB_CON, $query);
    }
}

?>