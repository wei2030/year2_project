<?php


    class Dashboard {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        // Student dashboard use
        public function findNumOfAct(){

            $this->db->query(

                'SELECT COUNT(ac_id) numAct
                FROM st_profile AS sp
                INNER JOIN activity_participants AS ap ON sp.st_id = ap.st_id
                WHERE sp.st_email = :st_email'

            );

            $this->db->bind(':st_email', $_SESSION['email']);
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findNumOfSkill(){

            $this->db->query(

                'SELECT COUNT(skill_id) numSkill
                FROM st_profile AS sp
                INNER JOIN stud_skills AS ss ON sp.st_id = ss.st_id
                WHERE sp.st_email = :st_email'

            );

            $this->db->bind(':st_email', $_SESSION['email']);
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findBadge(){

            $this->db->query("SELECT st_email, COUNT(ac_id) numAct FROM activity_participants WHERE st_email = :st_email GROUP BY st_email");
            $this->db->bind(':st_email', $_SESSION['email']);

            $result = $this->db->resultSet();

            if (!empty($result)) {
                
                $row = $result[0]; // Assuming the result set is not empty

                $num_activity = $row->numAct;

                if ($num_activity >= 0 && $num_activity <= 9) {
                    $badge_name = 'Iron';
                } elseif ($num_activity >= 10 && $num_activity <= 19) {
                    $badge_name = 'Bronze';
                } elseif ($num_activity >= 20 && $num_activity <= 29) {
                    $badge_name = 'Silver';
                } elseif ($num_activity >= 30 && $num_activity <= 39) {
                    $badge_name = 'Gold';
                } elseif ($num_activity >= 40 && $num_activity <= 49) {
                    $badge_name = 'Platinum';
                } elseif ($num_activity >= 50 && $num_activity <= 59) {
                    $badge_name = 'Diamond';
                } else {
                    $badge_name = 'Adventurer';
                }

                $sql = "SELECT * FROM badges WHERE badge_name = :badge_name";
                $this->db->query($sql);
                $this->db->bind(':badge_name', $badge_name);

                $result = $this->db->resultSet();

                return $result;

            } else {

                // Handle the case where the result set is empty
                return false;

            }

        }
        // End of student

        // Admin dashboard use
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

        public function findTotalSkill() {

            $this->db->query('SELECT COUNT(skill_id) numSkill FROM skills');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findTotalBadge() {

            $this->db->query('SELECT COUNT(badge_id) numBadge FROM badges');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findTotalAct() {

            $this->db->query('SELECT COUNT(ac_id) numAct FROM activity');
    
            $result = $this->db->resultSet();

            return $result;

        }
        // End of admin

        // Partner / Lecturer dashboard use
        public function findCreatedAct(){

            $this->db->query(

                'SELECT COUNT(ac_id) numAct
                FROM pn_profile AS pp
                INNER JOIN activity AS a ON pp.pn_id = a.pn_id
                WHERE pp.pn_email = :pn_email'

            );

            $this->db->bind(':pn_email', $_SESSION['email']);
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function findStuJoined(){

            $this->db->query(

                'SELECT COUNT(ap.st_id) totalStu
                FROM pn_profile AS pp
                INNER JOIN activity AS a ON pp.pn_id = a.pn_id
                INNER JOIN activity_participants AS ap ON a.ac_id = ap.ac_id
                WHERE pp.pn_email = :pn_email'

            );

            $this->db->bind(':pn_email', $_SESSION['email']);
    
            $result = $this->db->resultSet();

            return $result;

        }
        // End of partner / lecturer
    }

?>