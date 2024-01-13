<?php
class Accounts extends Controller
{
    public function __construct()
    {
        $this->accountModel = $this->model('Account');
        $this->activityModel = $this->model('Activities');

        if ($_SESSION['user_role'] == "Student") 
        {
            $studentProfile = $this->accountModel->studentProfile();
            
            $st_id = $this->activityModel->getStudentID($_SESSION['user_id']);

            $this->feedbackModel = $this->model('Feedbacks');

            $activities = $this->feedbackModel->findApprovedFeedback($st_id);

            $data = [
                'studentProfile' => $studentProfile,
                'activities' => $activities
            ];
        }
        else if ($_SESSION['user_role'] == "Lecturer") 
        {
            $lecturerProfile = $this->accountModel->lecturerProfile();

            $data = [
                'lecturerProfile' => $lecturerProfile
            ];
        }
        else if ($_SESSION['user_role'] == "Partner") 
        {
            $partnerProfile = $this->accountModel->partnerProfile();

            $data = [
                'partnerProfile' => $partnerProfile
            ];
        }
        else
        {
            $data = [ ];
        }

        $this->dashboardModel = $this->model('Dashboard');

        $studentBadge = $this->dashboardModel->findBadge();
        $data_2 = [
        'studentBadge' => $studentBadge
        ];

        $this->view('accounts/index', $data, $data_2);
    }

    public function index()
    {
        $this->view('accounts/index');
    }

    public function edit_profile()
    {

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file was uploaded without errors
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)){
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/accounts/edit_profile");
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/accounts/edit_profile");
                } 
                $location = "images/users/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/users/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/accounts/edit_profile");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/accounts/edit_profile");
              
            }

            // $_POST['update_student'] hidden value from form
            if ($_POST['update_student']) {

                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                    $data = [


                        'st_ic' => trim($_POST['st_ic']),
                        'st_email' => trim($_POST['st_email']),
                        'st_fullname' => trim($_POST['st_fullname']),
                        'st_gender' => trim($_POST['st_gender']),
                        'st_race' => trim($_POST['st_race']),
                        'univ_code' => trim($_POST['univ_code']),
                        'st_address' => trim($_POST['st_address']),
                        'st_phone' => trim($_POST['st_phone']),
                        'st_image' => $location,
                        'about_me' => trim($_POST['about_me'])
    
                    ];

                }else{

                    $data = [

                        'st_ic' => trim($_POST['st_ic']),
                        'st_email' => trim($_POST['st_email']),
                        'st_fullname' => trim($_POST['st_fullname']),
                        'st_gender' => trim($_POST['st_gender']),
                        'st_race' => trim($_POST['st_race']),
                        'univ_code' => trim($_POST['univ_code']),
                        'st_address' => trim($_POST['st_address']),
                        'st_phone' => trim($_POST['st_phone']),
                        'about_me' => trim($_POST['about_me'])
               
                    ];
                }

            } 
            else if ($_POST['update_lecturer'])
            {
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                    $data = [


                        'lc_ic' => trim($_POST['lc_ic']),
                        'lc_email' => trim($_POST['lc_email']),
                        'lc_fullname' => trim($_POST['lc_fullname']),
                        'lc_gender' => trim($_POST['lc_gender']),
                        'lc_race' => trim($_POST['lc_race']),
                        'univ_code' => trim($_POST['univ_code']),
                        'lc_address' => trim($_POST['lc_address']),
                        'lc_phone' => trim($_POST['lc_phone']),
                        'lc_image' => $location,
                        'about_me' => trim($_POST['about_me'])
    
                    ];

                }else{

                    $data = [

                        'lc_ic' => trim($_POST['lc_ic']),
                        'lc_email' => trim($_POST['lc_email']),
                        'lc_fullname' => trim($_POST['lc_fullname']),
                        'lc_gender' => trim($_POST['lc_gender']),
                        'lc_race' => trim($_POST['lc_race']),
                        'univ_code' => trim($_POST['univ_code']),
                        'lc_address' => trim($_POST['lc_address']),
                        'lc_phone' => trim($_POST['lc_phone']),
                        'about_me' => trim($_POST['about_me'])
               
                    ];
                }
            }
            else if ($_POST['update_partner'])
            {
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                    $data = [

                        'pn_name' => trim($_POST['pn_name']),
                        'pn_email' => trim($_POST['pn_email']),
                        'pn_address' => trim($_POST['pn_address']),
                        'pn_phone' => trim($_POST['pn_phone']),
                        'pn_image' => $location,
                        'about_me' => trim($_POST['about_me'])
    
                    ];

                }else{

                    $data = [

                        'pn_name' => trim($_POST['pn_name']),
                        'pn_email' => trim($_POST['pn_email']),
                        'pn_address' => trim($_POST['pn_address']),
                        'pn_phone' => trim($_POST['pn_phone']),
                        'about_me' => trim($_POST['about_me'])
               
                    ];
                }
            }


            if ($_POST['update_student']) {
                if ($this->accountModel->updateStudentProfile($data)) {
                    header("Location: " . URLROOT . "/accounts");
                } else {
                    die("Something went wrong, please try again!");
                }
            }
            else if($_POST['update_lecturer']){
                if ($this->accountModel->updateLecturerProfile($data)) {
                    header("Location: " . URLROOT . "/accounts");
                } else {
                    die("Something went wrong, please try again!");
                }

            }
            else if($_POST['update_partner']){
                if ($this->accountModel->updatePartnerProfile($data)) {
                    header("Location: " . URLROOT . "/accounts");
                } else {
                    die("Something went wrong, please try again!");
                }

            } 
           else 
            {
                $this->view('accounts');
            }
        } // end of if statement 

        $studentProfile = $this->accountModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $lecturerProfile = $this->accountModel->lecturerProfile();

        $data_2 = [
            'lecturerProfile' => $lecturerProfile
        ];

        $partnerProfile = $this->accountModel->partnerProfile();

        $data_3 = [
            'partnerProfile' => $partnerProfile
        ];


        $this->view('accounts/index', $data, $data_2, $data_3);
    }

    public function create_pn_account()
    {
        
        $data = [
            'username' => '',
            'password' => '',
            'pn_image' => '',
            'pn_name' => '',
            'pn_email' => '',
            'pn_address' => '',
            'pn_phone' => '',
            'about_me' => '',    
        ];
    
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file was uploaded without errors
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["file"]["name"];
            $filetype = $_FILES["file"]["type"];
            $filesize = $_FILES["file"]["size"];

            $fileExt = explode('.', $filename);
            $fileActualExt = strtolower(end($fileExt));

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)){
                $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                header("Location: " . URLROOT . "/accounts/create_pn_account");
            }

            $username = $_SESSION['email'];
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize){
                $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                        header("Location: " . URLROOT . "/accounts/create_pn_account");
            } 
            $location = "images/users/" . $username;
            if (in_array($filetype, $allowed)) {

                if (file_exists($location . $filename)) {
                    echo $filename . " is already exists.";
                } else {
                    
                        # create directory if not exists in upload/ directory
                        if (!is_dir($location)) {
                            //mkdir($location, 0755);
                            mkdir('images/users/' . $username, 0777, true);
                        }

                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                        $location .= "/" . $fileNameNew;

                        move_uploaded_file($_FILES['file']['tmp_name'], $location);
                }
            } else {
                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/accounts/create_pn_account");
            }
        } else {

            $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/accounts/create_pn_account");
          
        }
            
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
            // Assign POST data to $data
            $data = [
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'pn_image' => $location,
            'pn_name' => trim($_POST['pn_name']),
            'pn_email' => trim($_POST['pn_email']),
            'pn_address' => trim($_POST['pn_address']),
            'pn_phone' => trim($_POST['pn_phone']),
            'about_me' => trim($_POST['about_me'])
            ];
            } else {
            $data = [
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'pn_name' => trim($_POST['pn_name']),
            'pn_email' => trim($_POST['pn_email']),
            'pn_address' => trim($_POST['pn_address']),
            'pn_phone' => trim($_POST['pn_phone']),
            'about_me' => trim($_POST['about_me'])
            ];
            }

            if ($data['username'] && $data['password']) {
                //hash password
               $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            if ($this->accountModel->registerPartner($data)) {
            header('location: ' . URLROOT . '/accounts');
            exit;
            }
        }
        $this->view("accounts/index");
    }

    public function resume_activities()
    {
        $this->activityModel = $this->model('Activities');

        $activities = $this->activityModel->getJoinedActivities($_SESSION['user_id']);

        $data = [
        'activities' => $activities
        ];

        $this->view("accounts", $data);
    }
}
?>