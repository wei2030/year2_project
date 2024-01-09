<?php

    class Dashboards extends Controller {

        public function __construct() {

            $this->dashboardModel = $this->model('Dashboard');

        }

        public function index() {

            if ($_SESSION['user_role'] == "Student") {

                $data = [];
                $data_2 = [];
                $data_3 = [];
                $data_4 = [];
                $data_5 = [];
                $data_6 = [];
                $data_7 = [];

            }
            elseif($_SESSION['user_role'] == "Admin") {

                $numStu = $this->dashboardModel->findNumOfStu();
                $data = [
                    'numStu' => $numStu
                ];

                $numLec = $this->dashboardModel->findNumOfLec();
                $data_2 = [
                    'numLec' => $numLec
                ];

                $numPart = $this->dashboardModel->findNumOfPart();
                $data_3 = [
                    'numPart' => $numPart
                ];

                $numSkill = $this->dashboardModel->findNumOfSkill();
                $data_4 = [
                    'numSkill' => $numSkill
                ];

                $numBadge = $this->dashboardModel->findNumOfBadge();
                $data_5 = [
                    'numBadge' => $numBadge
                ];

                $numAct = $this->dashboardModel->findNumOfAct();
                $data_6 = [
                    'numAct' => $numAct
                ];

                $leaderboard = $this->dashboardModel->listLeaderboard();
                $data_7 = [
                    'leaderboard' => $leaderboard
                ];

            }
            elseif($_SESSION['user_role'] == "Lecturer") {

                $data = [];
                $data_2 = [];
                $data_3 = [];
                $data_4 = [];
                $data_5 = [];
                $data_6 = [];
                $data_7 = [];

            }
            elseif($_SESSION['user_role'] == "Partner") {

                $data = [];
                $data_2 = [];
                $data_3 = [];
                $data_4 = [];
                $data_5 = [];
                $data_6 = [];
                $data_7 = [];

            }
            else {

                $data = [];
                $data_2 = [];
                $data_3 = [];
                $data_4 = [];
                $data_5 = [];
                $data_6 = [];
                $data_7 = [];

            }

            $this->view('dashboards/index', $data, $data_2, $data_3, $data_4, $data_5, $data_6, $data_7);

        }
    }

?>