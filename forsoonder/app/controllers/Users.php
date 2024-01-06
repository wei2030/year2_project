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
            'image' => '',
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
                'race' => trim($_POST['race']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'fullNameError' => '',
                'emailError' => '',
                'icNoError' => '',
                'image' => '',
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
            } else if ($this->userModel->findUserByFullName($data['fullName'], $data['role'])) {
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
                $data['confirmPassword'] = $confirmPassword; 
                if (!$this->passwordsMatch($data['password'], $confirmPassword)) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }


                        // Validate icNo
                        if (empty($data['icNo'])) {
                            $data['icNoError'] = 'Please enter your IC number.';
                        } elseif ($this->userModel->findUserByIcNo($data['icNo'], $data['role'])) {
                            $data['icNoError'] = 'IC number is already taken.';
                        } elseif (!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $data['icNo']) || strlen(str_replace("-", "", $data['icNo'])) !== 12) {
                            $data['icNoError'] = 'Please enter a valid IC number.';
                        }

    
            // If there are no validation errors, proceed to registration
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['icNoError'])) {
                //hash password
               $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                if ($data['role'] == "Lecturer") {
                    if ($this->userModel->registerLecturer($data)) {
                        header('location: ' . URLROOT . '/users/login');
                        exit;
                    } else {
                        header('location: ' . URLROOT . '/users/login');
                    }
                } else if ($data['role'] == "Student") {
                    if ($this->userModel->registerStudent($data)) {
                        header('location: ' . URLROOT . '/users/login');
                        exit;
                    } else {
                        header('location: ' . URLROOT . '/users/login');
                    }
                }
            } else {
                $this->view('users/register', $data);
            }
        }
    
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
    
        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
    
            // Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }
    
            // Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }
    
            // Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if ($loggedInUser) {
                    // If the login is successful, redirect to the home page or some other page
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                    // Log the entered username and password
                    error_log("Entered Username: {$data['username']}, Entered Password: {$data['password']}");
                }
            }
        }
    
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_role'] = $user->user_role;

        $this->userModel->setUserPfp();

        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['user_role']);
        unset($_SESSION['user_pfp']);
        header('location:' . URLROOT . '/users/login');
    }

    public function reset_password()
    {

        $data = [

            'email' => '',
            'emailError' => '',
            'emailSuccess' => ''
        ];

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "<?php echo URLROOT; ?>/users/create_new_password/?selector=" . $selector . "&validator=" . bin2hex($token);

            date_default_timezone_set("Asia/Taipei");

            $expires = date("U") + 1800;

            $hashed_token = password_hash($token, PASSWORD_DEFAULT);

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'pwdResetSelector' => $selector,
                'pwdResetToken' => $hashed_token,
                'pwdResetExpires' => $expires,
                'emailError' => '',
                'emailSuccess' => ''
            ];

            //validate email
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter an email.";
            } else {
                // check if email exists
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "No account registered under this email.";
                } elseif ($data['email']) {
                    $delete_Reset_Email = $this->userModel->deleteResetEmail($data['email']);

                    if ($delete_Reset_Email) {

                        $this->userModel->createResetEmail($data);


                        $to = $data['email'];

                        $subject = "Reset your password for IdeaKPT";

                        $message = '<p>We received a password reset request. Here is your password reset link:';
                        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

                        $headers = "From: YT Track <YTtrack@gmail.com>\r\n";
                        $headers .= "Reply-To: YTtrack@gmail.com\r\n";
                        $headers .= "Content-type: text/html\r\n";

                        mail($to, $subject, $message, $headers);

                        $data['emailSuccess'] = 'We have sent the reset password link to your email. 
                        Please check your email. If you have not receive any email, please wait around 2 ~ 10 minutes or check your spam box.
                        Please request for new password again if you did not received any email after 10 minutes. Thank You.';

                        $this->view('users/reset_password', $data);
                    } else {
                        $data['emailError'] = 'Password or email is incorrect. Please try again.';

                        $this->view('users/reset_password', $data);
                    }
                }
            }
        } else { //if server request closed
            $data = [

                'email' => '',
                'emailError' => '',
                'emailSuccess' => ''
            ];
        }

        $this->view('users/reset_password', $data);
    }

    public function create_new_password()
    {

        $data = [

            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'selector' => trim($_POST['selector']),
            'validator' => trim($_POST['validator']),
            'passwordError' => '',
            'confirmPasswordError' => ''

        ];

        $passwordValidation = "/^(.{0,7}|[^a-z]|[^\d])$/i";

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open
            unset($_SESSION['passwordError']);
            unset($_SESSION['confirmPasswordError']);
    

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'selector' => trim($_POST['selector']),
                'validator' => trim($_POST['validator']),
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            //validate password on length and numeric values
            if (empty($data['password'])) {
                $_SESSION['passwordError'] = "Please enter password";
                header('location:' . $_SESSION['url_token']);
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $_SESSION['passwordError'] = "Password must have at least one numeric value";
                header('location:' . $_SESSION['url_token']);
            }

            //validate confirm password
            if (empty($data['confirmPassword'])) {
                $_SESSION['confirmPasswordError']= "Please enter password";
                header('location:' . $_SESSION['url_token']);
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $_SESSION['confirmPasswordError'] = "Password do not match, please try again.";
                    header('location:' . $_SESSION['url_token']);
                }
            }

            //make sure that errors are empty
            if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                //validate email
                if (empty($data['selector'])) {
                    $data['tokenError'] = "You need to re-submit your reset password request.";
                } else {
                    // check if token if exists
                    date_default_timezone_set("Asia/Taipei");

                    $findToken = $this->userModel->findEmailByToken($data['selector']);

                    if ($findToken) {

                        $tokenEmail = $findToken->pwdResetEmail;
                        $pwdResetToken = $findToken->pwdResetToken;

                        $tokenBin = hex2bin($data['validator']);
                        $tokenCheck = password_verify($tokenBin, $pwdResetToken);

                        if ($tokenCheck === true) {

                            $checkEmail = $this->userModel->checkEmailByToken($tokenEmail);

                            if ($checkEmail) {

                                $data = [
                                    'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                                    'confirmPassword' => trim($_POST['confirmPassword']),
                                    'selector' => trim($_POST['selector']),
                                    'validator' => trim($_POST['validator']),
                                    'email' => $tokenEmail,
                                    'passwordError' => '',
                                    'confirmPasswordError' => ''
                                ];

                                $this->userModel->updatePassword($data);

                                $data['tokenSuccess'] = "Your password has been changed";

                                $this->view('users/create_new_password', $data);
                            } else {
                                $data['tokenError'] = "No email associate with this token.";

                                $this->view('users/create_new_password', $data);
                            }
                        } else {

                            $data['tokenError'] = "Token is not valid. Please request for new password again.";
                        }
                    } else {
                        $data['tokenError'] = 'Your token or link may have been already expired.';

                        $this->view('users/create_new_password', $data);
                    }
                }
            }
        } else { //if server request closed
            $data = [

                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'selector' => trim($_POST['selector']),
                'validator' => trim($_POST['validator']),
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
        }

      
        $this->view('users/create_new_password', $data);
        
    }
}
