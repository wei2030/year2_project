<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password, fullName, 
        gender, icNo, address, university, course, race, martialStatus, role) VALUES (:username, :email, :password, :fullName, :gender, :icNo, :address, :university, :course, :race, :martialStatus, :role)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':fullName', $data['fullName']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':icNo', $data['icNo']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':university', $data['university']);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':race', $data['race']);
        $this->db->bind(':martialStatus', $data['martialStatus']);
        $this->db->bind(':role', $data['role']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($row) {
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row; // User authenticated successfully
            }
        }
    
        return false; // User not found or authentication failed
    }

        //Find user by email. Email is passed in by the Controller.
        public function findUserByUsername($username) {
            $this->db->query('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);
            $this->db->execute();
    
            return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }
    
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            $this->db->execute();
    
            return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }
    
        public function findUserByICNo($icNo) {
            $this->db->query('SELECT * FROM users WHERE icNo = :icNo');
            $this->db->bind(':icNo', $icNo);
            $this->db->execute();
    
            return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }
    
        public function findUserByFullName($fullName) {
            $this->db->query('SELECT * FROM users WHERE fullName = :fullName');
            $this->db->bind(':fullName', $fullName);
            $this->db->execute();
    
            return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }
}
