<?php


    class Skill {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        public function findAllSkills() {

            $this->db->query('SELECT * FROM skills');
    
            $result = $this->db->resultSet();

            return $result;

        }

        public function addSkill($data) {

            $this->db->query('INSERT INTO skills (skill_name, skill_desc, skill_dir) VALUES (:skill_name, :skill_desc, :skill_dir)');
        
            $this->db->bind(':skill_name', $data['skill_name']);
            $this->db->bind(':skill_desc', $data['skill_desc']);
            $this->db->bind(':skill_dir', $data['skill_dir']);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }

        public function findSkillById($id) {

            $this->db->query('SELECT * FROM skills WHERE skill_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;

        }

        public function updateSkill($data) {

            $this->db->query('UPDATE skills SET skill_name = :skill_name, skill_desc = :skill_desc, skill_dir = :skill_dir WHERE skill_id = :id');

            $this->db->bind(':id', $data['skill_id']);
            $this->db->bind(':skill_name', $data['skill_name']);
            $this->db->bind(':skill_desc', $data['skill_desc']);
            $this->db->bind(':skill_dir', $data['skill_dir']);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }

        public function deleteSkill($id){
            $this->db->query('DELETE FROM skills WHERE skill_id = :id');

            $this->db->bind(':id', $id);

            if ($this->db->execute()) {

                return true;

            } else {

                return false;
                
            }

        }

    }

?>