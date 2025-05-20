<?php

require_once "./db_credentials.php";
class Database{

    public $conn;

    public function __construct()
    {
       if(!isset($this->conn)){
            $this->conn =new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            if ($this->conn->connect_error){
                die("Connection error".$this->conn->connect_error);
            }
       }
       return $this->conn;

    }


    public function query($sql){
        $result=$this->conn->query($sql);
        if(!$result){
            echo "Error: ".$this->conn->error;
            return false;
        }
        return $result;
    }

    public function prepare($sql){
        $stmt=$this->conn->prepare($sql);
        if(!$stmt){
            echo "Error: ".$this->conn->error;
            return false;
        }
        return $stmt;
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