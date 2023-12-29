<?php

    class Badges extends Controller {
        public function __construct() {
            $this->badgeModel = $this->model('Badge');
        }

        public function index() {

            $badges = $this->badgeModel->findAllBadges();
            $data = [

                'badges' => $badges

            ];

            $this->view('badges/index');

        }

        
    }

?>