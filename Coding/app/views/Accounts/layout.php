

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

                    $c_url = URLROOT . "/accounts";
                    $e_url = URLROOT . "/accounts/edit_profile";
                    $r_url = URLROOT . "/accounts/resume";
                    
                    //error_reporting(0);
                    if ($url == $c_url)
                    {
                        if ($_SESSION['user_role'] == "Student")
                        {
                            require 'st_profile.php';
                        }
                        else if ($_SESSION['user_role'] == "Lecturer")
                        {
                            require 'lc_profile.php';
                        }
                        else if ($_SESSION['user_role'] == "Partner")
                        {
                            require 'pn_profile.php';
                        }
                        else if ($_SESSION['user_role'] == "Admin")
                        {
                            require 'ad_profile.php';
                        }
                    } 
                    else if ($url == $e_url)
                    {
                        if ($_SESSION['user_role'] == "Student")
                        {
                        require 'st_edit_profile.php';
                        }
                        else if ($_SESSION['user_role'] == "Lecturer")
                        {
                            require 'lc_edit_profile.php';
                        }
                        else if ($_SESSION['user_role'] == "Partner")
                        {
                            require 'pn_edit_profile.php';
                        }
                    }
                    else if ($url == $r_url)
                    {
                        require 'resume.php';
                    }

                    ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


