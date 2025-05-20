<?php

require_once "./src/php/Model/db_credentials.php";
class Database{

    public $conn;

    public function __construct()
    {
       try{
            if(!isset($this->conn)){
                $this->conn =new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
                if ($this->conn->connect_error){
                    die("Connection error".$this->conn->connect_error);
                }
            }
            return $this->conn;
       }
       catch (mysqli_sql_exception $e){
        die("Database Connection failed".$e);
       }

    }


    


    public function getConnection(){
        return $this->conn;

    }

    public function closeConnection(){
        if($this->conn){
            $this->conn->close();
            $this->conn=null;
            
        }
    }
    
}