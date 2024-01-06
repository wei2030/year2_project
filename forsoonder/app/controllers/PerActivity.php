


<?php

class perActivity extends Controller
{
    public function __construct()
    {
        $this->peractivityModel = $this->model('PerActivity');
    }
    public function index()
    {
        $peractivities = $this->peractivityModel->findAllperActivity();
        $data = 
        [
            'PerActivity' => $peractivities
        ];
        $this->view('PerActivity/index', $data);
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
            'description' => '',
            'evidence' => ''

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'name' => trim($_POST['name']),
            'date' => trim($_POST['date']),
            'venue' => trim($_POST['venue']),
            'description' => trim($_POST['description']),
            'evidence' => trim($_POST['evidence'])
            ];


            if ($data['name'] && $data['date'] && $data['venue'] && $data['description'] && $data['evidence']){
                if ($this->peractivityModel->addperActivity($data)){
                    header("Location: " . URLROOT. "/peractivity" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('peractivity/index', $data);
            }
        }

        $this->view('peractivity/index', $data);
    }

    public function update($pac_id)
    {
        $peractivities = $this->peractivityModel->findperActivityById($pac_id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/peractivity");
        }
        elseif($peractivities->id != $_SESSION['user_id'])
        {
            header("Location: " . URLROOT . "/peractivity");

        }

        $data = 
        [
            'peractivities' => $peractivities,
            'title' => '',
            'venue' => '',
            'nameError' => '',
            'venueError' => '',
            'u_url' => URLROOT . "/activity/update/".$pac_id
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
            'pac_id' => $pac_id,
            'post' => $peractivities,
            'id' => $_SESSION['id'],
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

            if($data['name'] == $this->peractivityModel->findperActivityById($pac_id)->name)
{
    $data['nameError'] = "At least change the name!";
}

if($data['venue'] == $this->peractivityModel->findActivityById($pac_id)->venue)
{
    $data['venueError'] = "At least change the venue!";
}



            if (empty($data['nameError'] && $data['venueError'])){
                if ($this->peractivityModel->updateperActivity($data)){
                    header("Location: " . URLROOT. "/peractivity" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('peractivity/index', $data);
            }
        }

        $this->view('peractivity/index', $data);
    }


    public function delete($pac_id)
    {
        $peractivities = $this->peractivityModel->findperActivityById($pac_id);

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        

            if($this->peractivityModel->deleteperActivity($pac_id)){
                header("Location: " . URLROOT . "/peractivity");
            }
            else
            {
                die('Something went wrong..');
            }
        }

        
        
    }

}

?>
