<?php

class Database {
    private $host ='localhost';
    private $DbName = 'buisness_db';
    private $username ="root";
    private $password ="";

    public $conn;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->DbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);  
        }
        
    }

    public function getConnection(){
        return $this->conn;
    }

    

}

$db = new Database();
$conn = $db->getConnection();