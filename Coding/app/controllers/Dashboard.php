<?php

    class Dashboard_user extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard');
        }

        public function index() {
            $this->view('Dashboard/index');
        }
    }