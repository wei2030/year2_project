

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
                
                    $c_url = URLROOT . "/peractivity"; 
                    $t_url = URLROOT . "/peractivity/create"; 
                    $p_url = URLROOT . "/peractivity/approved";

                    if (isset($data['perActivity']) && is_object($data['perActivity'])) {
                    $u_url = URLROOT . "/peractivity/update/".$data['perActivity']->pac_id; 
                    $a_url = URLROOT . "/peractivity/assign/".$data['perActivity']->pac_id;
                  }


                    //error_reporting(0);
                    if ($_SESSION['user_role'] == 'Student'){
                        if ($url == $c_url){
                            require 'manage.php';
                        }elseif($url == $t_url){
                            require 'create.php';
                        }elseif ($url == $u_url){
                            require 'update.php';
                        } elseif ($url == $p_url){
                            require 'approved.php';
                        } elseif ($url == $a_url){
                            require 'assign.php';
                        } else {

                        }

                        } elseif ($_SESSION['user_role'] == 'Lecturer' || $_SESSION['user_role'] == 'Admin') {
                            if ($url == $c_url){
                                require 'manage.php';
                            } else {

                            }
                        }
                    ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


