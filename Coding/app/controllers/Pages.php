<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');

        $this->accountModel = $this->model('Account');


        // Check if the user is not logged in and not on the login page
        if (!isLoggedIn() && !strpos($_SERVER['REQUEST_URI'], 'users/login')) {
            header('location:' . URLROOT . '/users/login');
            exit;
        }
    }

    public function index() {
        
        $studentProfile = $this->accountModel->studentProfile();

        $data = [
            'title' => 'Home page',
            'studentProfile' => $studentProfile
        ];

        $this->view('index', $data);
    }

    public function about() {
        $this->view('about');
    }
}
