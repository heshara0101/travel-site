<?php

class Database

{

    private static $instance = null;

    private $host;

    private $name;

    private $user;

    private $password;

    public $DB_CON;

    private function __construct()

    {

        // Detect environment

        

            // Local DB

            $this->host = 'localhost';

            $this->name = 'travel_site';

            $this->user = 'root';

            $this->password = '';

        

        // Create ONE connection only

        $this->DB_CON = mysqli_connect($this->host, $this->user, $this->password, $this->name);

        if (!$this->DB_CON) {

            die("Database connection failed: " . mysqli_connect_error());

        }

    }

    //  Singleton: Only 1 DB connection in full system

    public static function getInstance()

    {

        if (self::$instance === null) {

            self::$instance = new Database();

        }

        return self::$instance;

    }

    // Detect environment
    private function isLocalServer()
    {
        $serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';
        return in_array($serverName, ['localhost', '127.0.0.1', '::1']);
    }

    // Run query

    public function readQuery($query)

    {

        $result = mysqli_query($this->DB_CON, $query);

        if (!$result) {

            die("SQL Error: " . mysqli_error($this->DB_CON) . "<br>Query: " . $query);

        }

        return $result;

    }

    // Escape text

    public function escapeString($string)

    {

        return mysqli_real_escape_string($this->DB_CON, $string);

    }

    // Standardized Error Handler (JSON-safe for AJAX requests)
    private function handleError($message)
    {
        if ($this->isLocalServer()) {
            // Display detailed error in local environment
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => $message]);
                exit();
            } else {
                die($message);
            }
        } else {
            // Production environment - log silently and show friendly message
            error_log($message);
            die("An unexpected database error occurred. Please try again later.");
        }
    }

    //  Auto close connection when script ends

    public function __destruct()

    {

        if ($this->DB_CON) {

            mysqli_close($this->DB_CON);

        }

    }

}