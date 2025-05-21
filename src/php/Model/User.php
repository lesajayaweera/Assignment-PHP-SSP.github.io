<?php require_once ("./src/php/Model/Database.php"); ?>
<?php

abstract class User{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role;
    private $conn;


    private $table ="users";


    public function __construct($first_name, $last_name, $email, $password, $role){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $db = new Database();
        $this->conn = $db->getConnection();
        
    }

    // function to the login
    public function Login(){}

    // function to the register
    public function Register(){}   
    

    // function that to save user data to the db
    public function SaveData(){
        if($this->ValidateCredentials()){
            $hashed_pass = password_hash($this->password,PASSWORD_BCRYPT);
            $stmt =$this->conn->prepare("INSERT INTO ".$this->table. " (firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)" );
            $stmt->bind_param("sssss",$this->first_name,$this->last_name,$this->email,$hashed_pass,$this->role);
            $result = $stmt->execute();
            $stmt->close();

            return $result;


        }
    }

    // Validations

    // emails

    private function ValidateEmail(){
        if(!empty($this->email)){
            if(filter_var($this->email,FILTER_VALIDATE_EMAIL) || strlen($this->email)<255){
                return true;
            }
            else{
                return false;
                echo "Invalid Email Format";
            }
        }else{
            return false;
            echo "Email is mandatory";
        }
    }
    
    // first and last names
    private function ValidateNames(){
        if(!empty($this->first_name)&& !empty($this->last_name)){
            if((preg_match("/^[a-zA-Z-' ]*$/", $this->first_name))&&(preg_match("/^[a-zA-Z-' ]*$/", $this->last_name))){
                return true;
            }
            else{
                echo  "Name can only contain letters, spaces, hyphens, and apostrophes.";
                return false;
            }

        }else{
            echo "the First and the last name is mandatory";
            return false;
        }
    }

    // password

    private function ValidatePassword(){
        if(!empty($this->password)){
            if(strlen($this->password) <8 ){
                return true;
            }
            else{
                return false;
                echo "the password must have a minimum of 8 characters";
            }
        }else{
            return false;
            echo "the password is mandatory";
        }
    }

    public function ValidateCredentials(){
        if ($this->ValidateEmail() && $this->ValidateNames() && $this->ValidatePassword()) {
            return true;
        }
        return false;
    }
    


}