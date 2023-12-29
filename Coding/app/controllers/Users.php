<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        // Initialize data with default values
        $data = [
            'role' => '',
            'username' => '',
            'password' => '',
            'email' => '',
            'fullName' => '',
            'gender' => '',
            'icNo' => '',
            'address' => '',
            'university' => '',
            'course' => '',
            'race' => '',
            'martialStatus' => '',
            'usernameError' => '',
            'passwordError' => '',
            'confirmPassword' => '',
            'confirmPasswordError' => '',
            'fullNameError' => '',
            'emailError' => '',
            'icNoError' => '',
        ];
    
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Assign POST data to $data
            $data = [
                'role' => isset($_POST['role']) ? $_POST['role'] : '',
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'email' => trim($_POST['email']),
                'fullName' => trim($_POST['fullName']),
                'gender' => trim($_POST['gender']),
                'icNo' => trim($_POST['icNo']),
                'address' => trim($_POST['address']),
                'university' => trim($_POST['university']),
                'course' => trim($_POST['course']),
                'race' => trim($_POST['race']),
                'martialStatus' => trim($_POST['martialStatus']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'fullNameError' => '',
                'emailError' => '',
                'icNoError' => '',
            ];

            // Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            } else {
                // Check if username exists
                if ($this->userModel->findUserByUsername($data['username'])) {
                    $data['usernameError'] = 'Username is already taken.';
                }
            }

            // Validate fullName
            if (empty($data['fullName'])) {
                $data['fullNameError'] = 'Please enter your full name.';
            } else if ($this->userModel->findUserByFullName($data['fullName'])) {
                $data['fullNameError'] = 'Full name is already taken.';
            } else if (!preg_match("/^[a-zA-Z ]*$/", $data['fullName'])) {
                $data['fullNameError'] = 'Please enter a valid full name.';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter an email address.';
            } else {
                // Check if email exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 6 characters.';
            }

            // Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please confirm password.';
            } else {
                $confirmPassword = trim($_POST['confirmPassword']);
                $data['confirmPassword'] = $confirmPassword; // Add this line
                if (!$this->passwordsMatch($data['password'], $confirmPassword)) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }


                        // Validate icNo
                        if (empty($data['icNo'])) {
                            $data['icNoError'] = 'Please enter your IC number.';
                        } elseif ($this->userModel->findUserByIcNo($data['icNo'])) {
                            $data['icNoError'] = 'IC number is already taken.';
                        } elseif (!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $data['icNo']) || strlen(str_replace("-", "", $data['icNo'])) !== 12) {
                            $data['icNoError'] = 'Please enter a valid IC number.';
                        }

    
            // If there are no validation errors, proceed to registration
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['icNoError'])) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                // Register user from model function
                if ($this->userModel->register($data)) {
                    // Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                    exit;
                } else {
                    die('Something went wrong.'); // You might want to handle this more gracefully, e.g., log the error.
                }
            }
        }
    
        // Load the view with the data
        $this->view('users/register', $data);
    }

    public function passwordsMatch($password, $confirmPassword) {
        if ($password === $confirmPassword) {
            return true;
        } else {
            return false;
        }
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }
}
