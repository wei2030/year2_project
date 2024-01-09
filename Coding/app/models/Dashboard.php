<?php


    class Dashboard {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        public function findNumOfStu() {

            $this->db->query('SELECT COUNT(st_id) numStu FROM st_profile');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfLec() {

            $this->db->query('SELECT COUNT(lc_id) numLec FROM lc_profile');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfPart() {

            $this->db->query('SELECT COUNT(pn_id) numPart FROM pn_profile');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfSkill() {

            $this->db->query('SELECT COUNT(skill_id) numSkill FROM skills');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfBadge() {

            $this->db->query('SELECT COUNT(badge_id) numBadge FROM badges');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfAct() {

            $this->db->query('SELECT COUNT(ac_id) numAct FROM activity');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function listLeaderboard() {

            $this->db->query(

                'SELECT sp.st_fullname, COUNT(ac_id) numActJoin
                FROM st_profile AS sp
                INNER JOIN activity_participants AS ap ON sp.st_id = ap.st_id
                GROUP BY sp.st_fullname
                ORDER BY numActJoin DESC'

            );
    
            $result = $this->db->resultSet();

            return $result;

        }

    }

?>