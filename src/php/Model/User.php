<?php require_once ("./src/php/Model/Database.php"); ?>

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
    public function save() {
        if (!$this->validateCredentials()) {
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
    
    private function ValidateEmail() {
        if (!empty($this->email)) {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL) && strlen($this->email) < 255) {
                return true;
            } else {
                echo "Invalid Email Format<br>";
                return false;
            }
        } else {
            echo "Email is mandatory<br>";
            return false;
        }
    }

    private function ValidateNames() {
        if (!empty($this->first_name) && !empty($this->last_name)) {
            if (preg_match("/^[a-zA-Z-' ]*$/", $this->first_name) && preg_match("/^[a-zA-Z-' ]*$/", $this->last_name)) {
                return true;
            } else {
                echo "Name can only contain letters, spaces, hyphens, and apostrophes.<br>";
                return false;
            }
        } else {
            echo "First and last name are mandatory<br>";
            return false;
        }
    }

    private function ValidatePassword() {
        if (!empty($this->password)) {
            if (strlen($this->password) >= 8) {
                return true;
            } else {
                echo "The password must have a minimum of 8 characters<br>";
                return false;
            }
        } else {
            echo "The password is mandatory<br>";
            return false;
        }
    }

    public function ValidateCredentials() {
        return $this->ValidateEmail() && $this->ValidateNames() && $this->ValidatePassword();
    }


}
