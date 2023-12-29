<?php


    class Badge {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        public function findAllBadges() {

            $this->db->query('SELECT * FROM badges');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function addBadge($data) {

            $this->db->query('INSERT INTO badges (badge_name, badge_desc, icon) VALUES (:badge_name, :badge_desc, :icon)');
        
            $this->db->bind(':badge_name', $data['badge_name']);
            $this->db->bind(':badge_desc', $data['badge_desc']);
            $this->db->bind(':icon', $data['icon']);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }

        public function findBadgeById($id) {

            $this->db->query('SELECT * FROM badges WHERE badge_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;

        }

        public function updateBadge($data) {

            $this->db->query('UPDATE badges SET badge_name = :badge_name, badge_desc = :badge_desc, icon = :icon WHERE badge_id = :id');

            $this->db->bind(':id', $data['badge_id']);
            $this->db->bind(':badge_name', $data['badge_name']);
            $this->db->bind(':badge_desc', $data['badge_desc']);
            $this->db->bind(':icon', $data['icon']);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }

        public function deleteBadge($id){
            $this->db->query('DELETE FROM badges WHERE badge_id = :id');

            $this->db->bind(':id', $id);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;
                
            }

        }

    }

?>