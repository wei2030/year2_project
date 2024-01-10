<?php


    class UserList {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        public function userList() {

            $this->db->query(

                'SELECT username, email, user_role, datetime_register
                FROM users'
        
            );

            $result = $this->db->resultSet();

            return $result;

        }

        public function stuList() {

            $this->db->query(

                'SELECT st_fullname, st_email, st_phone, st_gender, st_race, st_address
                FROM st_profile
                ORDER BY st_fullname ASC'
        
            );

            $result = $this->db->resultSet();

            return $result;

        }

        public function lecList() {

            $this->db->query(

                'SELECT lc_fullname, lc_email, lc_phone, lc_gender, lc_race, lc_address
                FROM lc_profile
                ORDER BY lc_fullname ASC'
        
            );

            $result = $this->db->resultSet();

            return $result;
            
        }

        public function orgList() {

            $this->db->query(

                'SELECT pn_name, pn_email, pn_phone, pn_address
                FROM pn_profile
                ORDER BY pn_name ASC'
        
            );

            $result = $this->db->resultSet();

            return $result;
            
        }

    }

?>