<?php
class Accounts extends Controller
{
    public function __construct()
    {
        $this->accountModel = $this->model('Account');

        $studentProfile = $this->accountModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $this->view('accounts/index', $data);
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
            } else {
                $this->view('accounts');
            }
        } // end of if statement 

        $studentProfile = $this->accountModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $this->view('accounts/index', $data);
    }
}
?>