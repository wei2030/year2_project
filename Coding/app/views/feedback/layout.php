<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->

        <!--Content area here-->
        <?php
// Initialize $u_url to a default value
$u_url = "";

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}

// Append the host(domain name, ip) to the URL.
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$url .= $_SERVER['REQUEST_URI'];

$c_url = URLROOT . "/feedback";
$a_url = URLROOT . "/feedback/approved";
$u_url = '';

if (isset($data['feedback']) && is_object($data['feedback'])) {
    $u_url = URLROOT . "/feedback/update/".$data['feedback']->feedback_id;
    $ap_url = URLROOT . "/feedback/approve/".$data['feedback']->feedback_id;
}

// Assuming $_SESSION['user_role'] contains the role of the logged-in user
if ($_SESSION['user_role'] == "Student") {
if ($url == $c_url) {
    require 'manage.php';
}  elseif ($url == $u_url) {
    require 'update.php';
} elseif ($url == $a_url) {
    require 'approved.php';
    // Handle other URLs if needed
} else {
    // Handle other URLs if needed
}
} else if ($_SESSION['user_role'] == "Partner") {
if ($url == $c_url) {
    require 'manage.php';
} elseif ($url == $ap_url) {
    require 'approve.php';
} else {
    
}
} else if ($_SESSION['user_role'] == "Admin") {
if ($url == $c_url) {
    require 'manage.php';
} else if ($url == $a_url) {
    require 'approved.php';
    // Handle other URLs if needed
} elseif ($url == $ap_url) {
    require 'approve.php';
} else {
    
}
}
?>


        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
