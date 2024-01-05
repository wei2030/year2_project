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

    public function lecturerProfile()
    {
        $this->db->query("SELECT * FROM lc_profile WHERE lc_email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function partnerProfile()
    {
        $this->db->query("SELECT * FROM pn_profile WHERE pn_email = :email");

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

    public function updateLecturerProfile($data)
    {
 
        if (isset($data['lc_image'])) {

        $this->db->query("UPDATE lc_profile 
        SET lc_email = :email, lc_ic = :lc_ic, lc_fullname = :lc_fullname, lc_gender = :lc_gender,
        lc_race = :lc_race, univ_code  = :univ_code, lc_address  = :lc_address, lc_image  = :lc_image, about_me = :about_me WHERE lc_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':lc_ic', $data['lc_ic']);
        $this->db->bind(':lc_fullname', $data['lc_fullname']);
        $this->db->bind(':lc_gender', $data['lc_gender']);
        $this->db->bind(':lc_race', $data['lc_race']);
        $this->db->bind(':lc_address', $data['lc_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':lc_image', $data['lc_image']);
        $this->db->bind(':about_me', $data['about_me']);

        }else{

        $this->db->query("UPDATE lc_profile 
        SET lc_email = :email, lc_ic = :lc_ic, lc_fullname = :lc_fullname, lc_gender = :lc_gender,
        lc_race = :lc_race, univ_code  = :univ_code, lc_address  = :lc_address, about_me = :about_me WHERE lc_email = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':lc_ic', $data['lc_ic']);
        $this->db->bind(':lc_fullname', $data['lc_fullname']);
        $this->db->bind(':lc_gender', $data['lc_gender']);
        $this->db->bind(':lc_race', $data['lc_race']);
        $this->db->bind(':lc_address', $data['lc_address']);
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

    public function updatePartnerProfile($data)
    {
 
        if (isset($data['pn_image'])) {

        $this->db->query("UPDATE pn_profile 
        SET pn_email = :email, pn_name = :pn_name, pn_address = :pn_address, pn_phone = :pn_phone, pn_image = :pn_image, about_me = :about_me WHERE pn_email  = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':pn_name', $data['pn_name']);
        $this->db->bind(':pn_address', $data['pn_address']);
        $this->db->bind(':pn_phone', $data['pn_phone']);
        $this->db->bind(':pn_image', $data['pn_image']);
        $this->db->bind(':about_me', $data['about_me']);

        }else{

        $this->db->query("UPDATE pn_profile 
        SET pn_email = :email, pn_name = :pn_name, pn_address = :pn_address, pn_phone = :pn_phone, about_me = :about_me WHERE pn_email  = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':pn_name', $data['pn_name']);
        $this->db->bind(':pn_address', $data['pn_address']);
        $this->db->bind(':pn_phone', $data['pn_phone']);
        $this->db->bind(':about_me', $data['about_me']);
            
        }
        
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findAssoc($lc_id)
    {
        $this->db->query("SELECT * FROM st_lc_assoc WHERE lc_id = :lc_id");

        $this->db->bind(":lc_id", $lc_id);

        $result = $this->db->resultSet();

        return $result;
    }
}

?>