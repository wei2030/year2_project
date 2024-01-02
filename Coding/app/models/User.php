<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function registerLecturer($lecturerData) {
        // Insert into lecturer table
        $this->db->query('INSERT INTO lecturer (icNo, email, fullName, gender, race, university, course, address, image, martialStatus) 
                          VALUES (:icNo, :email, :fullName, :gender, :race, :university, :course, :address, :image, :martialStatus)');
    
        // Bind values
        $this->db->bind(':icNo', $lecturerData['icNo']);
        $this->db->bind(':email', $lecturerData['email']);
        $this->db->bind(':fullName', $lecturerData['fullName']);
        $this->db->bind(':gender', $lecturerData['gender']);
        $this->db->bind(':race', $lecturerData['race']);
        $this->db->bind(':university', $lecturerData['university']);
        $this->db->bind(':course', $lecturerData['course']);
        $this->db->bind(':address', $lecturerData['address']);
        $this->db->bind(':image', $lecturerData['image']);
        $this->db->bind(':martialStatus', $lecturerData['martialStatus']);
    
        // Execute query
        $this->db->execute();
    
        // Register user
        $userData = [
            'username' => $lecturerData['username'],
            'email' => $lecturerData['email'],
            'password' => $lecturerData['password'],
            'role' => 0,
            'fullName' => $lecturerData['fullName'], // Add fullName and icNo to $userData
            'icNo' => $lecturerData['icNo'],
        ];
    
        $this->registerUser($userData);
    }
    
    public function registerStudent($studentData) {
        // Insert into student table
        $this->db->query('INSERT INTO student (icNo, email, fullName, gender, race, university, course, address, image, martialStatus) 
                          VALUES (:icNo, :email, :fullName, :gender, :race, :university, :course, :address, :image, :martialStatus)');
    
        // Bind values
        $this->db->bind(':icNo', $studentData['icNo']);
        $this->db->bind(':email', $studentData['email']);
        $this->db->bind(':fullName', $studentData['fullName']);
        $this->db->bind(':gender', $studentData['gender']);
        $this->db->bind(':race', $studentData['race']);
        $this->db->bind(':university', $studentData['university']);
        $this->db->bind(':course', $studentData['course']);
        $this->db->bind(':address', $studentData['address']);
        $this->db->bind(':image', $studentData['image']);
        $this->db->bind(':martialStatus', $studentData['martialStatus']);
    
        // Execute query
        $this->db->execute();
    
        // Register user
        $userData = [
            'username' => $studentData['username'],
            'email' => $studentData['email'],
            'password' => $studentData['password'],
            'role' => 1,
            'fullName' => $studentData['fullName'], // Add fullName and icNo to $userData
            'icNo' => $studentData['icNo'],
        ];
    
        $this->registerUser($userData);
    }
    

    private function registerUser($userData) {

    // Insert into users table
    $this->db->query('INSERT INTO users (username, email, password, role, datetime_register, fullName, icNo) 
                      VALUES (:username, :email, :password, :role, NOW(), :fullName, :icNo)');

    // Bind values
    $this->db->bind(':username', $userData['username']);
    $this->db->bind(':email', $userData['email']);
    $this->db->bind(':password', $userData['password']); 
    $this->db->bind(':role', $userData['role']);
    $this->db->bind(':fullName', $userData['fullName']);
    $this->db->bind(':icNo', $userData['icNo']);

    // Execute query
    $this->db->execute();
}


public function login($username, $password) {
    $this->db->query('SELECT * FROM users WHERE username = :username');

    // Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    if ($row) {
        $hashedPassword = $row->password;

        // Verify the entered password with the hashed password
        if (password_verify($password, $hashedPassword)) {
            return $row;  // Passwords match
        } else {
            return false;  // Passwords do not match
        }
    } else {
        return false;  // User not found
    }
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
