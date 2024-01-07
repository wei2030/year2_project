<?php

class Activity extends Controller
{
    public function __construct()
    {
        $this->activityModel = $this->model('Activities');
    }
    public function index()
    {
        $activities = $this->activityModel->findAllActivity();
        $data = [
            'activity' => $activities,
            'isStudentJoined' => function ($user_id, $ac_id) {
                return $this->activityModel->isStudentJoined($user_id, $ac_id);
            }
        ];
    
        // Check if the user is a student
        if ($_SESSION['user_role'] == "Student") {
            // For each activity, determine if the student has joined
            foreach ($activities as &$activity) {
                $activity->status = $data['isStudentJoined']($_SESSION['user_id'], $activity->ac_id) ? 'joined' : 'not-joined';
            }
        }
    
        $this->view('activity/index', $data,);
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
        'activity' => $joinedActivities,
    ];

    $this->view('activity/joined', $data);
}

}

?>
