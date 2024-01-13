<?php

    class Dashboards extends Controller {

        public function __construct() {

            $this->dashboardModel = $this->model('Dashboard');

        }

        public function index() {

            if ($_SESSION['user_role'] == "Student") {

                $numAct = $this->dashboardModel->findNumOfAct();
                $data = [
                    'numAct' => $numAct
                ];

                $numSkill = $this->dashboardModel->findNumOfSkill();
                $data_2 = [
                    'numSkill' => $numSkill
                ];

                $studentBadge = $this->dashboardModel->findBadge();
                $data_3 = [
                    'studentBadge' => $studentBadge
                ];

                $leaderboard = $this->dashboardModel->listLeaderboard();
                $data_4 = [
                    'leaderboard' => $leaderboard
                ];

                $data_5 = [];
                $data_6 = [];
                $data_7 = [];
                $data_8 = [];

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

                $numSkill = $this->dashboardModel->findTotalSkill();
                $data_4 = [
                    'numSkill' => $numSkill
                ];

                $numBadge = $this->dashboardModel->findTotalBadge();
                $data_5 = [
                    'numBadge' => $numBadge
                ];

                $numAct = $this->dashboardModel->findCreatedAct();
                $data_6 = [
                    'numAct' => $numAct
                ];

                $totalStu = $this->dashboardModel->findStuJoined();
                $data_7 = [
                    'totalStu' => $totalStu
                ];

                $leaderboard = $this->dashboardModel->listLeaderboard();
                $data_8 = [
                    'leaderboard' => $leaderboard
                ];

            }
            elseif($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Partner") {

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

                $numAct = $this->dashboardModel->findCreatedAct();
                $data_4 = [
                    'numAct' => $numAct
                ];

                if($_SESSION['user_role'] == "Lecturer"){
                    $totalStu = $this->dashboardModel->findStuAssoc();
                } else {
                    $totalStu = $this->dashboardModel->findStuJoined();
                }
                $data_5 = [
                    'totalStu' => $totalStu
                ];
                

                $data_6 = [];
                $data_7 = [];
                $data_8 = [];

            }
            else {

                $data = [];
                $data_2 = [];
                $data_3 = [];
                $data_4 = [];
                $data_5 = [];
                $data_6 = [];
                $data_7 = [];
                $data_8 = [];

            }

            $this->view('dashboards/index', $data, $data_2, $data_3, $data_4, $data_5, $data_6, $data_7, $data_8);

        }
    }

?>