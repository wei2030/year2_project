<?php

class Activity extends Controller
{
    public function __construct()
    {
        $this->activityModel = $this->model('Activities');
        $this->accountModel = $this->model('Account');
    }
    
    public function index()
{
    $user_role = $_SESSION['user_role'];// Replace this with your actual logic to get the user role

    $activities = [];

    if ($user_role === 'Student' || $user_role === 'Lecturer' || $user_role === 'Admin') {
        $activities = $this->activityModel->findAllActivity();
        $studentProfile = $this->accountModel->studentProfile();
        $data = [
            'activity' => $activities,
            'isStudentJoined' => function ($user_id, $ac_id) {
                return $this->activityModel->isStudentJoined($user_id, $ac_id);
            },
            'studentProfile' => $studentProfile
        ];
    } else {
        $user_id = $_SESSION['user_id']; // Replace this with your actual logic to get the user ID
        $activities = $this->activityModel->findAllActivityOrganizer($user_id);
        $data = [
            'activity' => $activities,
            'isStudentJoined' => function ($user_id, $ac_id) {
                return $this->activityModel->isStudentJoined($user_id, $ac_id);
            }
        ];
    }


    $this->view('activity/index', $data);
}


public function create()
    {
        if (!isLoggedIn()){
            header("Location: " . URLROOT. "/users/login" );
        }

        $data = 
        [
            'name' => '',
            'category' =>'',
            'date_reg_start' => '',
            'date_reg_end' => '',
            'activitystart' => '',
            'activityend' => '',
            'venue' => '',
            'desc' => '',
            'max_participants' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'name' => trim($_POST['name']),
            'category' => trim($_POST['category']),
            'date_reg_start' => trim($_POST['date_reg_start']),
            'date_reg_end' => trim($_POST['date_reg_end']),
            'activitystart' => trim($_POST['activitystart']),
            'activityend' => trim($_POST['activityend']),
            'venue' => trim($_POST['venue']),
            'desc' => trim($_POST['desc']),
            'max_participants' => trim($_POST['max_participants']),
            ];


            if ($data['name']  && $data['category'] &&  $data['venue'] && $data['desc'] && $data['date_reg_start'] && $data['date_reg_end'] && $data['activitystart']){
                if ($this->activityModel->addActivity($data)){
                    header("Location: " . URLROOT. "/activity" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('activity/index', $data);
            }
        }

        $this->view('activity/index', $data);
    }

    public function update($ac_id)
    {
        $activities = $this->activityModel->findActivityById($ac_id);
    
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/activity");
            exit();
        } elseif ($activities->user_id != $_SESSION['user_id']) {
            header("Location: " . URLROOT . "/activity");
            exit();
        }
    
        $data = [
            'activities' => $activities,
            'name' => '',
            'date_reg_start' => '',
            'date_reg_end' => '',
            'activitystart' => '',
            'activityend' => '',
            'venue' => '',
            'desc' => '',
            'max_participants' => '',
            'nameError' => '',
            'venueError' => '',
            'u_url' => URLROOT . "/activity/update/" . $ac_id
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['name'] = trim($_POST['name']);
            $data['venue'] = trim($_POST['venue']);
            $data['desc'] = trim($_POST['desc']);
            $data['date_reg_start'] = trim($_POST['date_reg_start']);
            $data['date_reg_end'] = trim($_POST['date_reg_end']);
            $data['activitystart'] = trim($_POST['activitystart']);
            $data['activityend'] = trim($_POST['activityend']);
            $data['max_participants'] = trim($_POST['max_participants']);
    
            if (empty($data['name'])) {
                $data['nameError'] = 'The title of a post cannot be empty';
            }
    
            if (empty($data['venue'])) {
                $data['venueError'] = 'The body of a post cannot be empty';
            }
    
            if (empty($data['nameError']) && empty($data['venueError'])) {
                if ($this->activityModel->updateActivity($ac_id, $data)) {
                    header("Location: " . URLROOT . "/activity");
                    exit();
                } else {
                    die("Something went wrong :(");
                }
            }
        }
    
        $this->view('activity/index', $data);
    }
    


    public function delete($ac_id)
    {
        $activities = $this->activityModel->findActivityById($ac_id);

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        

            if($this->activityModel->deleteActivity($ac_id)){
                header("Location: " . URLROOT . "/activity");
            }
            else
            {
                die('Something went wrong..');
            }
        }

        $this->view('activity/index', $data);

}

public function join($ac_id)
{
    if (!isLoggedIn()) {
        header("Location: " . URLROOT . "/activity");
        exit();
    }

    $activity = $this->activityModel->findActivityById($ac_id);

    // Redirect if the user is the owner of the activity
    if ($activity->user_id == $_SESSION['user_id']) {
        header("Location: " . URLROOT . "/activity");
        exit();
    }

    // Check if registration is ended or activity is full
    if ($this->activityModel->isRegistrationEnded($ac_id, $activity->date_reg_end) ) {
        echo '<script>alert("Registration has ended.")</script>';
        echo '<script>window.location.href = "http://localhost/mvcprojectnew/activity";</script>';
    } else if ($this->activityModel->isActivityFull($ac_id, $activity->max_participants)) {
        echo '<script>alert("The activity is full.")</script>';
        echo '<script>window.location.href = "http://localhost/mvcprojectnew/activity";</script>';
    } else if ($this->activityModel->isStudentJoined($_SESSION['user_id'], $ac_id)) {
        echo '<script>alert("You have already joined this activity.")</script>';
        echo '<script>window.location.href = "http://localhost/mvcprojectnew/activity";</script>';
    } else if ($this->activityModel->isRegistrationStarted($ac_id, $activity->date_reg_start)) {
        echo '<script>alert("Registration has not started yet.")</script>';
        echo '<script>window.location.href = "http://localhost/mvcprojectnew/activity";</script>';
    } else {
        // Perform the join operation
        if ($this->activityModel->joinActivity($ac_id, $_SESSION['user_id'])) {
            echo '<script>alert("You have successfully joined the activity.")</script>';
            echo '<script>window.location.href = "http://localhost/mvcprojectnew/activity";</script>';
        } else {
            die("Something went wrong :(");
        }
    }
}

public function joined()
{
    if (!isLoggedIn() || $_SESSION['user_role'] !== "Student") {
        header("Location: " . URLROOT . "/activity");
        exit();
    }

   // Fetch activities that the current student has joined
    $joinedActivities = $this->activityModel->getJoinedActivities($_SESSION['user_id']);

    $data = [
        'joinedActivities' => $joinedActivities,
    ];


    $this->view('activity/index', $data);
}

public function form($ac_id)
{
    if (!isLoggedIn() || $_SESSION['user_role'] !== "Student") {
        header("Location: " . URLROOT . "/activity");
        exit();
    }

    $activity = $this->activityModel->findActivityById($ac_id);
    $participant_id = $this->activityModel->getParticipantId($ac_id, $_SESSION['user_id']);

    $data = [
        'ac_id' => isset($activity->ac_id) ? $activity->ac_id : '',
        'name' => isset($activity->name) ? $activity->name : '',
        'st_id' => '',
        'st_fullname' => '',
        'univ_code' => '',
        'q1' => '',
        'q2' => '',
        'q3' => '',
        'content_q1' => '',
        'content_q2' => '',
        'content_q3' => '',
        'presenter_q1' => '',
        'presenter_q2' => '',
        'presenter_q3' => '',
        'projectFile' => '',
        'activity' => $activity,
        'studentProfile' => $this->accountModel->studentProfile(),
        'participant_id' => $participant_id
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Upload file
        if (!empty($_FILES['projectFile']['name'])){            
            $file_name=$_FILES['projectFile']['name'];
            $file_temp=$_FILES['projectFile']['tmp_name'];
            $file_destination= 'uploads/'.$file_name;

            if(move_uploaded_file($file_temp, $file_destination)){
                $data['projectFile']=$file_destination;
            }
            else{
                echo "File upload failed!";
            } 
        } else {
            $data['projectFile'] = '';
        }
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'ac_id' => trim($_POST['ac_id']),
            'name' => trim($_POST['ac_name']),
            'st_id' => trim($_POST['st_id']),
            'st_fullname' => trim($_POST['st_fullname']),
            'univ_code' => trim($_POST['univ_code']),
            'q1' => trim($_POST['q1']),
            'q2' => trim($_POST['q2']),
            'q3' => trim($_POST['q3']),
            'content_q1' => trim($_POST['content_q1']),
            'content_q2' => trim($_POST['content_q2']),
            'content_q3' => trim($_POST['content_q3']),
            'presenter_q1' => trim($_POST['presenter_q1']),
            'presenter_q2' => trim($_POST['presenter_q2']),
            'presenter_q3' => trim($_POST['presenter_q3']),
            'projectFile' => $data['projectFile'],
            'activity' => $activity,
            'studentProfile' => $this->accountModel->studentProfile(),
            'participant_id' => $participant_id
        ];

        if ($this->activityModel->addFeedback($data)) {
            header("Location: " . URLROOT . "/activity/joined");
            exit();
        } else {
            die("Something went wrong :(");
        }
    }

    $this->view('activity/index', $data);
}

public function checkFeedbackStatus($activity_id)
{
    if (!isLoggedIn()) {
        // Handle the case when the user is not logged in
        return false;
    }

    // Check if the user has already submitted feedback for the activity
    $hasFeedback = $this->activityModel->hasFeedback($activity_id, $_SESSION['user_id']);

    return $hasFeedback;
}




}



?>
