<?php

    class Dashboard_user extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard_user');
        }

        public function index() {
            $this->view('Dashboard_user/index');
        }
    }