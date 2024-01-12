<?php

class Feedback extends Controller
{
    public function __construct()
    {
        $this->activityModel = $this->model('Activities');
        $this->accountModel = $this->model('Account');
        $this->feedbackModel = $this->model('feedbacks');
    }
    
    public function index()
{
    $user_role = $_SESSION['user_role'];// Replace this with your actual logic to get the user role

    $feedbacks = [];

    if ($user_role === 'Student') {
        $st_id = $this->activityModel->getStudentID($_SESSION['user_id']);
        $feedbacks = $this->feedbackModel->showFeedbackByACID($st_id);

        // Assuming $ac_id should be fetched from the activity model
        $ac_id = $this->activityModel->getActivityIdForStudent($st_id);

        $feedbacks2 = $this->feedbackModel->showFeedbackDetails($ac_id);
        $studentProfile = $this->accountModel->studentProfile();
        $data = [
            'feedback' => $feedbacks,
            'feedback2' => $feedbacks2,
            'studentProfile' => $studentProfile
        ];
    } elseif ($_SESSION['user_role'] == "Partner") {
        $user_id = $_SESSION['user_id'];
        $ac_id = $this->activityModel->getActivityIdByOrganizer($_SESSION['user_id']);
        $feedbacks = $this->feedbackModel->findFeedbackByActivityId($ac_id);
        $data = [
            'feedback' => $feedbacks
        ];
    } elseif ($_SESSION['user_role'] == "Admin") {
        $user_id = $_SESSION['user_id'];
        $ac_id = $this->activityModel->getActivityIdByOrganizer($_SESSION['user_id']);
        $feedbacks = $this->feedbackModel->showAllFeedback();
        $data = [
            'feedback' => $feedbacks
        ];
    }


    $this->view('feedback/index', $data);
}


    public function delete($feedback_id)
    {
        $feedbacks = $this->feedbackModel->findFeedbackById($feedback_id);

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        

            if($this->feedbackModel->deleteFeedback($feedback_id)){
                header("Location: " . URLROOT . "/feedback");
            }
            else
            {
                die('Something went wrong..');
            }
        }

        $this->view('feedback/index', $data);

}

public function approved()
    {
        // Check if the user is logged in
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }
    

        if ($_SESSION['user_role'] == "Student") {
        // Get the student ID
        $st_id = $this->activityModel->getStudentID($_SESSION['user_id']);
    
        // Get only approved personal activities
        $approvedFeedback = $this->feedbackModel->findApprovedFeedback($st_id);
    
        $data = [
            'feedback' => $approvedFeedback
        ];
    } else if ($_SESSION['user_role'] == "Admin") {
        $approvedFeedback = $this->feedbackModel->showAllApproved();
    
        $data = [
            'feedback' => $approvedFeedback
        ];
    } 
    
        $this->view('feedback/index', $data);
    }


    public function approve($feedback_id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }
    
        $feedbacks = $this->feedbackModel->findFeedbackById($feedback_id);
    
        if (!$feedbacks) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }
    
        $data = [
            'feedbacks' => $feedbacks,
            'feedback_id' => $feedback_id,
        ];
    
    
    
            if ($this->feedbackModel->setApprove($feedback_id)) {
                echo '<script>alert("You have successfully approved the feedback.");</script>';
                echo '<script>window.location.href = "http://localhost/mvcprojectnew/feedback";</script>';
                exit;
            }  else {
                echo '<script>alert("You have successfully approved the feedback.");</script>';
                echo '<script>window.location.href = "http://localhost/mvcprojectnew/feedback";</script>';
            }
        
    
        $this->view('feedback/index', $data);
    }

    public function details($feedback_id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }

        $feedback = $this->feedbackModel->findFeedbackById($feedback_id);

        if (!$feedback) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }

        $data = [
            'feedback' => $feedback
        ];

        $this->view('feedback/details', $data);
    }

    public function update($feedback_id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/feedback");
            exit; // Added exit to stop further execution
        }
    
        $feedback = $this->feedbackModel->findFeedbackById($feedback_id);
    
        $data = [
            'feedback' => $feedback,
            'feedback_id' => $feedback_id,
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
            'u_url' => URLROOT . '/feedback/update/' . $feedback_id
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'feedback_id' => $_POST['feedback_id'],
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
                'projectFile' => $feedback->projectFile,
            ];
    
            // Check if there are no errors
            // Check if a new projectFile file is uploaded
            if (!empty($_FILES['projectFile']['name'])) {
                $file_name = $_FILES['projectFile']['name'];
                $file_temp = $_FILES['projectFile']['tmp_name'];
                $file_destination = 'uploads/' . $file_name;
    
                if (move_uploaded_file($file_temp, $file_destination)) {
                    // If upload is successful, update the projectFile file
                    $data['projectFile'] = $file_destination;
                } else {
                    echo "File upload failed!";
                }
            } else {
                $data['projectFile'] = $feedback->projectFile;
            }
    
            if ($this->feedbackModel->updateFeedback($data)) {
                echo '<script>alert("You have successfully updated the feedback.");</script>';
                echo '<script>window.location.href = "http://localhost/mvcprojectnew/feedback";</script>';
                exit;
            } else {
                die('Something went wrong.');
            }
        }
    
        $this->view('feedback/index', $data);
    }
    
}







?>
