<?php require_once ("./src/php/Model/Database.php");
require_once("./src/php/Model/Validator.php");
 ?>

<?php

 class User {
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role;
    protected $conn;

    private $table = "users";

    public function __construct($first_name = "", $last_name = "", $email = "", $password = "", $role = "") {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $db = new Database();
        $this->conn = $db->getConnection();
    }

     // Save user to DB (returns boolean)
    public function save($firstname,$lastname,$email,$password) {
        if (!Validator::validateCredentials($firstname,$lastname,$email,$password)) {
            return false;
        }

        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO $this->table (firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->first_name, $this->last_name, $this->email, $hashed_password, $this->role);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Authenticate user (returns user data array or false)
    public function authenticate($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    public function GetUser_ID($email,$role){
        $stmt =$this->conn->prepare("SELECT id FROM $this->table WHERE email = ? AND role = ?");
        $stmt->bind_param("ss",$email,$role);
        $stmt->execute();

        $result =$stmt->get_result();
        if($result->num_rows === 1){
            $row = $result->fetch_assoc();
            return $row['id'];
        }
        return false;
    }
    
    


}
