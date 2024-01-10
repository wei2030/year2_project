<?php

    class UserLists extends Controller {

        public function __construct() {

            $this->userlistModel = $this->model('UserList');

        }

        public function index() {

            $userList = $this->userlistModel->userList();
            $data = [

                'userList' => $userList

            ];

            $stuList = $this->userlistModel->stuList();
            $data_2 = [

                'stuList' => $stuList

            ];

            $lecList = $this->userlistModel->lecList();
            $data_3 = [

                'lecList' => $lecList

            ];

            $orgList = $this->userlistModel->orgList();
            $data_4 = [

                'orgList' => $orgList

            ];

            $this->view('userlists/index', $data, $data_2, $data_3, $data_4);

        }

        

    }

?>