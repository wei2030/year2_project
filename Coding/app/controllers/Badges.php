<?php

    class Badges extends Controller {

        public function __construct() {

            $this->badgeModel = $this->model('Badge');

        }

        public function index() {

            $badges = $this->badgeModel->findAllBadges();
            $data = [

                'badges' => $badges

            ];

            $this->view('badges/index', $data);

        }

        public function create() {

            if (!isLoggedIn()){

                header("Location: " . URLROOT. "/badges" );

            }

            $data = [

                'badge_name' => '',
                'badge_desc' => '',
                'icon_dir' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $tempname = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];

                if($error === 0) {

                    // check filesize
                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) {

                        $_SESSION['error'] = "Sorry, your file is greater than 5Mb";
                        header("Location: " . URLROOT . "/badges/create");

                    } else {

                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        $ext_lc = strtolower($ext);

                        $allowed = array("jpg", "jpeg", "png");

                        if(in_array($ext_lc, $allowed)) {

                            $uploadDir = 'assets/media/badges/';
                            $newIconPath = $uploadDir . basename($filename);

                            // exit if file already existed
                            if(file_exists($newIconPath)) {

                                echo $filename . " is already exists.";

                            } else {

                                // Create the directory if it doesn't exist
                                if(!file_exists($uploadDir)) {

                                    mkdir($uploadDir, 0755, true);

                                }

                                // Set appropriate permissions on the directory
                                chmod($uploadDir, 0755);

                                // $filenameNew = uniqid('', true) . "." . $ext_lc;

                                $uploadDir .= "/" . $filename;

                                move_uploaded_file($tempname, $uploadDir);

                            }
    
                        } else {
                            
                            $_SESSION['error'] = "Sorry, your file is not supported";
                            header("Location: " . URLROOT . "/badges/create");

                        }

                    }

                } else {

                    $_SESSION['error'] = "Unknown error occur";
                    header("Location: " . URLROOT . "/badges/create");

                }

                $data = [

                    // 'user_id' => $_SESSION['user_id'],
                    'badge_name' => trim($_POST['badge_name']),
                    'badge_desc' => trim($_POST['badge_desc']),
                    'icon_dir' => $newIconPath

                ];

                if ($data['badge_name'] && $data['badge_desc'] && $data['icon_dir']) {

                    if ($this->badgeModel->addBadge($data)) {

                        $_SESSION['error'] = "";

                        header("Location: " . URLROOT. "/badges" );
                        
                    } else {

                        die("Something went wrong :(");

                    }
                    
                } else {

                    $this->view('badges/index', $data);

                }

            }

            $this->view('badges/index', $data);

        }

        public function update($id) {

            $badge = $this->badgeModel->findBadgeById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/badges");

            } 
            // elseif($badge->user_id != $_SESSION['user_id']) {

            //     header("Location: " . URLROOT . "/posts");

            // }

            $data = [

                'badge' => $badge,
                'badge_name' => '',
                'badge_desc' => '',
                'icon_dir' => '',
                'badge_name_Error' => '',
                'badge_desc_Error' => '',
                'icon_dir_Error' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if(!empty($_FILES['image'])) {

                    $filename = $_FILES['image']['name'];
                    $filesize = $_FILES['image']['size'];
                    $tempname = $_FILES['image']['tmp_name'];
                    $error = $_FILES['image']['error'];

                    if($error === 0) {

                        // check filesize
                        $maxsize = 5 * 1024 * 1024;
                        if($filesize > $maxsize) {

                            $_SESSION['error'] = "Sorry, your file is greater than 5Mb";
                            header("Location: " . URLROOT . "/badges/update");

                        } else {

                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            $ext_lc = strtolower($ext);

                            $allowed = array("jpg", "jpeg", "png");

                            if(in_array($ext_lc, $allowed)) {

                                $uploadDir = 'assets/media/badges/';
                                $newIconPath = $uploadDir . basename($filename);

                                // exit if file already existed
                                if(file_exists($newIconPath)) {

                                    echo $filename . " is already exists.";

                                } else {

                                    // Create the directory if it doesn't exist
                                    if(!file_exists($uploadDir)) {

                                        mkdir($uploadDir, 0755, true);

                                    }

                                    // Set appropriate permissions on the directory
                                    chmod($uploadDir, 0755);

                                    // $filenameNew = uniqid('', true) . "." . $ext_lc;

                                    $uploadDir .= "/" . $filename;

                                    move_uploaded_file($tempname, $uploadDir);

                                }
        
                            } else {
                                
                                $_SESSION['error'] = "Sorry, your file is not supported";
                                header("Location: " . URLROOT . "/badges/update");

                            }

                        }

                    } else {

                        $_SESSION['error'] = "Unknown error occur";
                        header("Location: " . URLROOT . "/badges/update");

                    }

                } 
                // else {

                //     $newIconPath = trim($_POST['existing_icon']);

                // }

                $data = [

                    'badge_id' => $id,
                    'badge' => $badge,
                    // 'user_id' => $_SESSION['user_id'],
                    'badge_name' => trim($_POST['badge_name']),
                    'badge_desc' => trim($_POST['badge_desc']),
                    'icon_dir' => $newIconPath,
                    'badge_name_Error' => '',
                    'badge_desc_Error' => '',
                    'icon_dir_Error' => ''

                ];

                // Check empty
                if(empty($data['badge_name'])) {

                    $data['badge_name_Error'] = 'The name of a badge cannot be empty';

                }

                if(empty($data['badge_desc'])) {

                    $data['badge_desc_Error'] = 'The description of a badge cannot be empty';

                }

                if(empty($data['icon_dir'])) {

                    $data['icon_dir'] = $this->badgeModel->findBadgeById($id)->icon_dir;

                }
                // End of Check empty

                // Check changes
                if($data['badge_name'] == $this->badgeModel->findBadgeById($id)->badge_name) {

                    $data['badge_name_Error'] = "At least change the name!";

                }

                if($data['badge_desc'] == $this->badgeModel->findBadgeById($id)->badge_desc) {

                    $data['badge_desc_Error'] = "At least change the description!";

                }
                // End of Check changes


                if (empty($data['badge_name_Error'] && $data['badge_desc_Error'] && $data['icon_dir_Error'])) {

                    if ($this->badgeModel->updateBadge($data)) {

                        header("Location: " . URLROOT. "/badges" );

                    } else {

                        die("Something went wrong :(");

                    }

                } else {

                    $this->view('badges/index', $data);

                }

            }

            $this->view('badges/index', $data);

        }

        public function delete($id) {

            $badge = $this->badgeModel->findBadgeById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/badges");

            }
            // elseif($post->user_id != $_SESSION['user_id'])
            // {
            //     header("Location: " . URLROOT . "/posts");

            // }

            $data = [

                'badge' => $badge,
                'badge_name' => '',
                'badge_desc' => '',
                'icon_dir' => '',
                'badge_name_Error' => '',
                'badge_desc_Error' => '',
                'icon_dir_Error' => ''

            ];

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            }

            if($this->badgeModel->deleteBadge($id)){

                header("Location: " . URLROOT . "/badges");

            } else {

                die('Something went wrong..');

            }
            
        }

    }

?>