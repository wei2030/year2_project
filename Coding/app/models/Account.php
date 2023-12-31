<?php 

class Account 
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function studentProfile()
    {
        $this->db->query("SELECT * FROM st_profile WHERE st_email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function updateStudentProfile($data)
    {

 
        if (isset($data['st_image'])) {

        $this->db->query("UPDATE st_profile 
        SET st_email = :email, st_ic = :st_ic, st_fullname = :st_fullname, st_gender = :st_gender,
        st_race = :st_race, univ_code  = :univ_code, st_address  = :st_address, st_image  = :st_image, about_me = :about_me WHERE st_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':st_ic', $data['st_ic']);
        $this->db->bind(':st_fullname', $data['st_fullname']);
        $this->db->bind(':st_gender', $data['st_gender']);
        $this->db->bind(':st_race', $data['st_race']);
        $this->db->bind(':st_address', $data['st_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':st_image', $data['st_image']);
        $this->db->bind(':about_me', $data['about_me']);

        }else{

        $this->db->query("UPDATE st_profile 
        SET st_email = :email, st_ic = :st_ic, st_fullname = :st_fullname, st_gender = :st_gender,
        st_race = :st_race, univ_code  = :univ_code, st_address  = :st_address, about_me = :about_me WHERE st_email = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':st_ic', $data['st_ic']);
        $this->db->bind(':st_fullname', $data['st_fullname']);
        $this->db->bind(':st_gender', $data['st_gender']);
        $this->db->bind(':st_race', $data['st_race']);
        $this->db->bind(':st_address', $data['st_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':about_me', $data['about_me']);
            
        }
        
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>