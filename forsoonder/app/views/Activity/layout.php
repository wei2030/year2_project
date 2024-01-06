<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->

        <!--Content area here-->
        <?php
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://";
        } else {
            $url = "http://";
        }
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];

        $c_url = URLROOT . "/activity";
        $t_url = URLROOT . "/activity/create";
        $f_url = URLROOT . "/activity/form";

        if (isset($data['activities']) && is_object($data['activities'])) {
            $u_url = URLROOT . "/activity/update/" . $data['activities']->ac_id;
        }

        if (strpos($url, URLROOT . "/activity/join/") !== false) {
            $j_url = URLROOT . "/activity/join/";
        }

        // Assuming $_SESSION['user_role'] contains the role of the logged-in user
        $userRole = $_SESSION['user_role'];

        // error_reporting(0);
        if ($userRole == 'Lecturer') {
            if ($url == $c_url) {
                require 'manage.php';
            } elseif ($url == $t_url) {
                require 'create.php';
            } elseif ($url == $u_url) {
                require 'update.php';
            } else { 
                // Handle other URLs if needed
            }
        } elseif ($userRole == 'Student') {
            if ($url == $c_url) {
                require 'manage.php';
            } elseif ($url == $j_url) {
                // Display content for join action
                require 'join.php';
            } else if ($url == $f_url) {
                require 'form.php';
                // Handle other URLs if needed
            }
        }
        ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
