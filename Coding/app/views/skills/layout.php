<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->
        <?php
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https://";
                    else
                        $url = "http://";
                    // Append the host(domain name, ip) to the URL.   
                    $url .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL   
                    $url .= $_SERVER['REQUEST_URI'];
                    
                    ?>

        <?php

                    // rule to access each file
                    $c_url = URLROOT . "/skills";
                    $t_url = URLROOT . "/skills/create";
                    // $a_url = URLROOT . "/skills/assign";

                    if (isset($data['skill']) && is_object($data['skill'])) {

                        $a_url = URLROOT . "/skills/assign/".$data['skill']->skill_id;
                        $u_url = URLROOT . "/skills/update/".$data['skill']->skill_id; 

                    }

                    //error_reporting(0);
                    if ($url == $c_url) {

                        if ($_SESSION['user_role'] == "Student"){

                            require 'studSkills.php';

                        }
    
                        elseif ($_SESSION['user_role'] == "Admin"){
    
                            require 'listSkills.php';
    
                        }

                    } elseif($url == $t_url) {

                        if ($_SESSION['user_role'] == "Student"){

                            header("Location: " . URLROOT . "/skills");

                        }
    
                        elseif ($_SESSION['user_role'] == "Admin"){
    
                            require 'create.php';
    
                        }

                    } elseif($url == $a_url) {

                        if ($_SESSION['user_role'] == "Student"){

                            header("Location: " . URLROOT . "/skills");

                        }
    
                        elseif ($_SESSION['user_role'] == "Admin"){
    
                            require 'assign.php';
    
                        }

                    } elseif($url == $u_url) {

                        if ($_SESSION['user_role'] == "Student"){

                            header("Location: " . URLROOT . "/skills");

                        }
    
                        elseif ($_SESSION['user_role'] == "Admin"){
    
                            require 'update.php';
    
                        }

                    } else {



                    }

                    ?>

        <!--End of Content area here-->

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


