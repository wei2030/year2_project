<?php

    class Skills extends Controller {

        public function __construct() {

            $this->skillModel = $this->model('Skill');

        }

        public function index() {

            $skills = $this->skillModel->findAllSkills();
            $data = [

                'skills' => $skills

            ];

            $this->view('skills/index', $data);

        }

        public function create() {

            if (!isLoggedIn()){

                header("Location: " . URLROOT. "/skills" );

            }

            $data = [

                'skill_name' => '',
                'skill_desc' => '',
                'skill_dir' => ''

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
                        header("Location: " . URLROOT . "/skills/create");

                    } else {

                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        $ext_lc = strtolower($ext);

                        $allowed = array("jpg", "jpeg", "png");

                        if(in_array($ext_lc, $allowed)) {

                            $uploadDir = 'assets/media/skills/';
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
                            header("Location: " . URLROOT . "/skills/create");

                        }

                    }

                } else {

                    $_SESSION['error'] = "Unknown error occur";
                    header("Location: " . URLROOT . "/skills/create");

                }

                $data = [

                    // 'user_id' => $_SESSION['user_id'],
                    'skill_name' => trim($_POST['skill_name']),
                    'skill_desc' => trim($_POST['skill_desc']),
                    'skill_dir' => $newIconPath

                ];

                if ($data['skill_name'] && $data['skill_desc'] && $data['skill_dir']) {

                    if ($this->skillModel->addSkill($data)) {

                        $_SESSION['error'] = "";

                        header("Location: " . URLROOT. "/skills" );
                        
                    } else {

                        die("Something went wrong :(");

                    }
                    
                } else {

                    $this->view('skills/index', $data);

                }

            }

            $this->view('skills/index', $data);

        }

        public function update($id) {

            $skill = $this->skillModel->findSkillById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/skills");

            } 

            $data = [

                'skill' => $skill,
                'skill_name' => '',
                'skill_desc' => '',
                'skill_dir' => '',
                'skill_name_Error' => '',
                'skill_desc_Error' => '',
                'skill_dir_Error' => ''

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
                            header("Location: " . URLROOT . "/skills/update/" . $data['skill']->skill_id);

                        } else {

                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            $ext_lc = strtolower($ext);

                            $allowed = array("jpg", "jpeg", "png");

                            if(in_array($ext_lc, $allowed)) {

                                $uploadDir = 'assets/media/skills/';
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
                                header("Location: " . URLROOT . "/skills/update/" . $data['skill']->skill_id);

                            }

                        }

                    }

                $data = [

                    'skill_id' => $id,
                    'skill' => $skill,
                    // 'user_id' => $_SESSION['user_id'],
                    'skill_name' => trim($_POST['skill_name']),
                    'skill_desc' => trim($_POST['skill_desc']),
                    'skill_dir' => $newIconPath,
                    'skill_name_Error' => '',
                    'skill_desc_Error' => '',
                    'skill_dir_Error' => ''

                ];

                // Check empty
                if(empty($data['skill_name'])) {

                    $data['skill_name_Error'] = 'The name of a skill cannot be empty';

                }

                if(empty($data['skill_desc'])) {

                    $data['skill_desc_Error'] = 'The description of a skill cannot be empty';

                }

                if(empty($data['skill_dir'])) {

                    $data['skill_dir'] = $this->skillModel->findSkillById($id)->skill_dir;

                }
                // End of Check empty

                // Check changes
                if($data['skill_name'] == $this->skillModel->findSkillById($id)->skill_name) {

                    $data['skill_name_Error'] = "At least change the name!";

                }

                if($data['skill_desc'] == $this->skillModel->findSkillById($id)->skill_desc) {

                    $data['skill_desc_Error'] = "At least change the description!";

                }

                if($data['skill_dir'] == $this->skillModel->findSkillById($id)->skill_dir) {

                    $data['skill_dir_Error'] = "At least change the icon!";

                }
                // End of Check changes


                if (empty($data['skill_name_Error'] && $data['skill_desc_Error'] && $data['icon_dir_Error'])) {

                    if ($this->skillModel->updateSkill($data)) {

                        $_SESSION['error'] = "";

                        header("Location: " . URLROOT. "/skills" );

                    } else {

                        die("Something went wrong :(");

                    }

                } else {

                    $this->view('skills/index', $data);

                }

            }

            $this->view('skills/index', $data);

        }

        public function delete($id) {

            $skill = $this->skillModel->findSkillById($id);

            if(!isLoggedIn()) {

                header("Location: " . URLROOT . "/skills");

            }
            // elseif($post->user_id != $_SESSION['user_id'])
            // {
            //     header("Location: " . URLROOT . "/posts");

            // }

            $data = [

                'skill' => $skill,
                'skill_name' => '',
                'skill_desc' => '',
                'skill_dir' => '',
                'skill_name_Error' => '',
                'skill_desc_Error' => '',
                'skill_dir_Error' => ''

            ];

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            }

            if($this->skillModel->deleteSkill($id)){

                header("Location: " . URLROOT . "/skills");

            } else {

                die('Something went wrong..');

            }
            
        }

    }

?>