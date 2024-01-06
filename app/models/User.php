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
            'user_reg_status' => 'Valid',
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
    
        public function findUserByICNo($icNo, $role) {
            if ($role == "Lecturer") {
                $this->db->query('SELECT * FROM lc_profile WHERE lc_ic = :icNo');
                $this->db->bind(':icNo', $icNo);
                $this->db->execute();
            } else if ($role == "Student") {
                $this->db->query('SELECT * FROM st_profile WHERE st_ic = :icNo');
                $this->db->bind(':icNo', $icNo);
                $this->db->execute();
            }
        
                return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }
    
        public function findUserByFullName($fullName, $role) {
          if ($role == "Lecturer") {
            $this->db->query('SELECT * FROM lc_profile WHERE lc_fullname = :fullName');
            $this->db->bind(':fullName', $fullName);
            $this->db->execute();
          } else if ($role == "Student") {
            $this->db->query('SELECT * FROM st_profile WHERE st_fullname = :fullName');
            $this->db->bind(':fullName', $fullName);
            $this->db->execute();
          }
    
            return $this->db->rowCount(); // Returns 1 if user exists, 0 if not
        }

        public function setUserPfp()
        {
            $email = $_SESSION['email'];

            if ($_SESSION['user_role'] == "Student")
            {
                $this->db->query('SELECT * FROM st_profile WHERE st_email = :email');
            }
            else if ($_SESSION['user_role'] == "Lecturer")
            {
                $this->db->query('SELECT * FROM lc_profile WHERE lc_email = :email');
            }

            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if ($row) 
            {
                if ($_SESSION['user_role'] == "Student")
                {
                    $_SESSION['user_pfp'] = $row->st_image;
                }
                else if ($_SESSION['user_role'] == "Lecturer")
                {
                    $_SESSION['user_pfp'] = $row->lc_image;
                }
            }
        }

        public function checkIfJoined($user_id, $ac_id)
        {
            // Check if the user with user_id has already joined the activity with ac_id
            $this->db->query('SELECT * FROM activity_participants WHERE user_id = :user_id AND ac_id = :ac_id');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':ac_id', $ac_id);
    
            $row = $this->db->single();
    
            return ($row) ? true : false;
        }

        public function updatePassword($data)
    {

        $this->db->query("UPDATE users SET password = :password 
            WHERE email = :email;");

        //Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createResetEmail($data)
    {

        //admin users
        $this->db->query("INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
         VALUES(:pwdResetEmail, :pwdResetSelector, :pwdResetToken, :pwdResetExpires);");

        $this->db->bind(':pwdResetEmail', $data['email']);
        $this->db->bind(':pwdResetSelector', $data['pwdResetSelector']);
        $this->db->bind(':pwdResetToken', $data['pwdResetToken']);
        $this->db->bind(':pwdResetExpires', $data['pwdResetExpires']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteResetEmail($email)
    {

        $this->db->query("DELETE FROM pwdReset WHERE pwdResetEmail = :pwdResetEmail");
        $p = 1;
        $this->db->bind(':pwdResetEmail', $email);
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

//Find user by email. Email is passed in by the controller.
    public function checkEmailByToken($email)
    {
        //prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //email param will be binded with the email variable.

        $this->db->bind(':email', $email);

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the controller.
    public function findEmailByToken($selector)
    {

        //prepared statement
        $this->db->query('SELECT * FROM pwdReset 
        WHERE pwdResetSelector = :pwdResetSelector AND pwdResetExpires >= :pwdResetExpires');

        //email param will be binded with the email variable.
        
        $currentDate = date("U");

        $this->db->bind(':pwdResetSelector', $selector);
   
        $this->db->bind(':pwdResetExpires', $currentDate);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {

            return false;
        }
    }

    
}
