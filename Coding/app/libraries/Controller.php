<?php
    //Load the model and the view
    class Controller {
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = [], $data_2 = [], $data_3 = [], $data_4 = [], $data_5 = [],
                                $data_6 = [], $data_7 = [], $data_8 = [], $data_9 = [], $data_10 = [],
                                $data_11 = [], $data_12 = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }
    }
?>