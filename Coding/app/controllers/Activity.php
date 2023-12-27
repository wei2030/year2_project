<?php

class Activity extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Activities');
    }
    public function index()
    {
        $activities = $this->postModel->findAllActivity();
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
                if ($this->postModel->addActivity($data)){
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

    public function update($id)
    {
        $activities = $this->postModel->findActivityById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/activity");
        }
        elseif($activities->user_id != $_SESSION['user_id'])
        {
            header("Location: " . URLROOT . "/activity");

        }

        $data = 
        [
            'activities' => $activities,
            'title' => '',
            'venue' => '',
            'nameError' => '',
            'venueError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'ac_id' => $id,
            'post' => $activities,
            'user_id' => $_SESSION['user_id'],
            'name' => trim($_POST['name']),
            'venue' => trim($_POST['venue']),
            'nameError' => '',
            'venueError' => ''
            ];

            if(empty($data['name'])){
                $data['nameError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['venue'])){
                $data['venueError'] = 'The body of a post cannot be empty';
            }

            if($data['name'] == $this->postModel->findActivityById($id)->name)
            {
                $data['titleError'] = "At least change the title!";
            }

            if($data['venue'] == $this->postModel->findActivityById($id)->venue)
            {
                $data['bodyError'] = "At least change the body!";
            }


            if (empty($data['nameError'] && $data['venueError'])){
                if ($this->postModel->updateActivity($data)){
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

}

?>
