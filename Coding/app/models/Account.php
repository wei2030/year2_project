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
        st_race = :st_race, univ_code  = :univ_code, st_address  = :st_address, st_image  = :st_image, st_phone = :st_phone, about_me = :about_me WHERE st_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':st_ic', $data['st_ic']);
        $this->db->bind(':st_fullname', $data['st_fullname']);
        $this->db->bind(':st_gender', $data['st_gender']);
        $this->db->bind(':st_race', $data['st_race']);
        $this->db->bind(':st_address', $data['st_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':st_phone', $data['st_phone']);
        $this->db->bind(':st_image', $data['st_image']);
        $this->db->bind(':about_me', $data['about_me']);

        }else{

        $this->db->query("UPDATE st_profile 
        SET st_email = :email, st_ic = :st_ic, st_fullname = :st_fullname, st_gender = :st_gender,
        st_race = :st_race, univ_code  = :univ_code, st_address  = :st_address, st_phone = :st_phone, about_me = :about_me WHERE st_email = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':st_ic', $data['st_ic']);
        $this->db->bind(':st_fullname', $data['st_fullname']);
        $this->db->bind(':st_gender', $data['st_gender']);
        $this->db->bind(':st_race', $data['st_race']);
        $this->db->bind(':st_address', $data['st_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':st_phone', $data['st_phone']);
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
        lc_race = :lc_race, univ_code  = :univ_code, lc_address  = :lc_address, lc_phone = :lc_phone, lc_image  = :lc_image, about_me = :about_me WHERE lc_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':lc_ic', $data['lc_ic']);
        $this->db->bind(':lc_fullname', $data['lc_fullname']);
        $this->db->bind(':lc_gender', $data['lc_gender']);
        $this->db->bind(':lc_race', $data['lc_race']);
        $this->db->bind(':lc_address', $data['lc_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':lc_phone', $data['lc_phone']);
        $this->db->bind(':lc_image', $data['lc_image']);
        $this->db->bind(':about_me', $data['about_me']);

        }else{

        $this->db->query("UPDATE lc_profile 
        SET lc_email = :email, lc_ic = :lc_ic, lc_fullname = :lc_fullname, lc_gender = :lc_gender,
        lc_race = :lc_race, univ_code  = :univ_code, lc_address  = :lc_address, lc_phone = :lc_phone, about_me = :about_me WHERE lc_email = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':lc_ic', $data['lc_ic']);
        $this->db->bind(':lc_fullname', $data['lc_fullname']);
        $this->db->bind(':lc_gender', $data['lc_gender']);
        $this->db->bind(':lc_race', $data['lc_race']);
        $this->db->bind(':lc_address', $data['lc_address']);
        $this->db->bind(':univ_code', $data['univ_code']);
        $this->db->bind(':lc_phone', $data['lc_phone']);
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

    public function registerPartner($partnerData)
    {
        // Insert into users table
        $this->db->query('INSERT INTO users (username, email, password, user_role, datetime_register, user_reg_status) 
                          VALUES (:username, :email, :password, "Partner", NOW(), "Valid")');
    
        // Bind values
        $this->db->bind(':username', $partnerData['username']);
        $this->db->bind(':email', $partnerData['pn_email']);
        $this->db->bind(':password', $partnerData['password']);
    
        // Execute query
        $this->db->execute();

        // Insert into lecturer table
        $this->db->query('INSERT INTO pn_profile (pn_email, pn_name, pn_address, pn_phone, pn_image, about_me) 
                         VALUES (:email, :pn_name, :pn_address, :pn_phone, :pn_image, :about_me)');
    
        // Bind values
        $this->db->bind(':email', $partnerData['pn_email']);
        $this->db->bind(':pn_name', $partnerData['pn_name']);
        $this->db->bind(':pn_image', $partnerData['pn_image']);
        $this->db->bind(':pn_address', $partnerData['pn_address']);
        $this->db->bind(':pn_phone', $partnerData['pn_phone']);
        $this->db->bind(':about_me', $partnerData['about_me']);

        // Execute query
        $this->db->execute();
    }

    public function findStudentBadge($email)
    {
        $this->db->query("SELECT st_email, COUNT(ac_id) numAct FROM activity_participants WHERE st_email = :st_email GROUP BY st_email");
        $this->db->bind(':st_email', $email);

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


}

?>