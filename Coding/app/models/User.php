<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function registerLecturer($lecturerData) {
        // Insert into lecturer table
        $this->db->query('INSERT INTO lc_profile (lc_ic, lc_email, lc_fullname, lc_gender, lc_race, univ_code, lc_address, lc_image) 
                         VALUES (:icNo, :email, :fullName, :gender, :race, :university, :address, :image)');
    
        // Bind values
        $this->db->bind(':icNo', $lecturerData['icNo']);
        $this->db->bind(':email', $lecturerData['email']);
        $this->db->bind(':fullName', $lecturerData['fullName']);  // Fix typo in binding
        $this->db->bind(':gender', $lecturerData['gender']);
        $this->db->bind(':race', $lecturerData['race']);
        $this->db->bind(':university', $lecturerData['university']);
        $this->db->bind(':address', $lecturerData['address']);
        $this->db->bind(':image', $lecturerData['image']);
    
        // Execute query
        $this->db->execute();
    
        // Register user
        $userData = [
            'username' => $lecturerData['username'],
            'email' => $lecturerData['email'],
            'password' => $lecturerData['password'],  // Fix case inconsistency
            'role' => "Lecturer",
        ];
    
        $this->registerUser($userData);
    }
    
    public function registerStudent($studentData) {
        // Insert into student table
        $this->db->query('INSERT INTO st_profile (st_ic, st_email, st_fullname, st_gender, st_race, univ_code, st_address, st_image) 
                          VALUES (:icNo, :email, :fullName, :gender, :race, :university, :address, :image)');
    
        // Bind values
        $this->db->bind(':icNo', $studentData['icNo']);
        $this->db->bind(':email', $studentData['email']);
        $this->db->bind(':fullName', $studentData['fullName']);  // Fix typo in binding
        $this->db->bind(':gender', $studentData['gender']);
        $this->db->bind(':race', $studentData['race']);
        $this->db->bind(':university', $studentData['university']);
        $this->db->bind(':address', $studentData['address']);
        $this->db->bind(':image', $studentData['image']);
    
        // Execute query
        $this->db->execute();
    
        // Register user
        $userData = [
            'username' => $studentData['username'],
            'email' => $studentData['email'],
            'password' => $studentData['password'],
            'role' => "Student",
            'user_reg_status' => 'Valid',
        ];
    
        $this->registerUser($userData);
    }
    

    private function registerUser($userData) {
        // Insert into users table
        $this->db->query('INSERT INTO users (username, email, password, user_role, datetime_register, user_reg_status) 
                          VALUES (:username, :email, :password, :role, NOW(), :user_reg_status)');
    
        // Bind values
        $this->db->bind(':username', $userData['username']);
        $this->db->bind(':email', $userData['email']);
        $this->db->bind(':password', $userData['password']);
        $this->db->bind(':role', $userData['role']);
        $this->db->bind(':user_reg_status', $userData['user_reg_status']);
    
        // Execute query
        $this->db->execute();
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
