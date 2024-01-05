<?php


    class Skill {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }

        // Admin CRUD part
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

        public function assignSkills($data){ // assign skills to student

            $this->db->query('INSERT INTO stud_skills (st_id, skill_id) VALUES (:st_id, :skill_id)');
        
            $this->db->bind(':st_id', $data['st_id']);
            $this->db->bind(':skill_id', $data['skill_id']);

            //execute function
            if ($this->db->execute()) {

                return true;

            } else {

                return false;

            }

        }
        // End of admin CRUD part

        // Student view part
        public function findStudentSkills(){

            $this->db->query(

                'SELECT s.skill_name, s.skill_desc, s.skill_dir
                FROM st_profile AS st 
                INNER JOIN stud_skills AS ss ON st.st_id = ss.st_id
                INNER JOIN skills AS s ON ss.skill_id = s.skill_id
                WHERE st_email = :email'

            );

            $this->db->bind(':email', $_SESSION['email']);
    
            $result = $this->db->resultSet();

            return $result;

        }
        // End of student view part

    }

?>
