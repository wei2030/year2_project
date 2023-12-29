<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');

        // Check if the user is not logged in and not on the login page
        if (!isLoggedIn() && !strpos($_SERVER['REQUEST_URI'], 'users/login')) {
            header('location:' . URLROOT . '/users/login');
            exit;
        }
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function about() {
        $this->view('about');
    }
}
