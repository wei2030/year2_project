<?php

    class Dashboard_user extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard');
        }

        public function index() {
            $dashboard = $this->dashboardModel->manage_dashboard();

            $data = [

                'dashboard' => $dashboard

            ]

            $this->view('Dashboard/index');
        }
    }