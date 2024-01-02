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
        $data = 
        [
            'activity' => $activities
        ];
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
            'date' => '',
            'venue' => '',
            'desc' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'name' => trim($_POST['name']),
            'date' => trim($_POST['date']),
            'venue' => trim($_POST['venue']),
            'desc' => trim($_POST['desc'])
            ];


            if ($data['name'] && $data['date'] && $data['venue'] && $data['desc']){
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
            'venue' => '',
            'desc' => '',
            'nameError' => '',
            'venueError' => '',
            'u_url' => URLROOT . "/activity/update/" . $ac_id
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['name'] = trim($_POST['name']);
            $data['venue'] = trim($_POST['venue']);
            $data['desc'] = trim($_POST['desc']);
    
            if (empty($data['name'])) {
                $data['nameError'] = 'The title of a post cannot be empty';
            }
    
            if (empty($data['venue'])) {
                $data['venueError'] = 'The body of a post cannot be empty';
            }
    
            if ($data['name'] == $activities->name) {
                $data['nameError'] = "At least change the name!";
            }
    
            if ($data['venue'] == $activities->venue) {
                $data['venueError'] = "At least change the venue!";
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

        
        
    }

}

?>
