<?php


    class Dashboard {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function manage_dashboard(){
            $this->db->query();

            $results = $this->db->resultSet();

            return $results;
        }
    }