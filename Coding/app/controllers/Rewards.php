<?php

    class Rewards extends Controller {
        public function __construct() {
            $this->rewardModel = $this->model('Reward');
        }

        public function index() {

            $this->view('rewardss/index');

        }
    }

?>