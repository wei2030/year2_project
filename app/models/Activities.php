<?php

class Activities
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllActivity()
{
    $this->db->query("SELECT * FROM activity ORDER BY ac_id DESC");
    
    $result = $this->db->resultSet();

    return $result;
}


    public function findActivityById($id)
    {
        $this->db->query('SELECT * FROM activity WHERE ac_id = :ac_id');
        $this->db->bind(':ac_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateActivity($ac_id, $data)
    {
        // Build the SET part of the query dynamically based on the provided data
        $setPart = '';
        $updateData = [
            'name' => 'name',
            'venue' => 'venue',
            'date_reg_start' => 'date_reg_start',
            'date_reg_end' => 'date_reg_end',
            'activitystart' => 'activitystart',
            'desc' => 'desc',
            'max_participants' => 'max_participants'
        ];
    
        foreach ($updateData as $field => $param) {
            if (isset($data[$field])) {
                $setPart .= "`$field` = :$param, ";
            }
        }
    
        // Remove the trailing comma and space
        $setPart = rtrim($setPart, ', ');
    
        // Build the full query
        $query = "UPDATE activity SET $setPart WHERE ac_id = :ac_id";
    
        // Execute the query
        $this->db->query($query);
        
        $this->db->bind(':ac_id', $ac_id);
    
        // Bind parameters dynamically
        foreach ($updateData as $field => $param) {
            if (isset($data[$field])) {
                $this->db->bind(":$param", $data[$field]);
            }
        }
    
        // Execute the query and handle the result (if needed)
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    

public function addActivity($data)
{
    $this->db->query('INSERT INTO activity (name, category, date_reg_start, date_reg_end, activitystart, venue, `desc`, user_id, max_participants) VALUES (:name, :category, :date_reg_start, :date_reg_end, :activitystart, :venue, :desc, :user_id, :max_participants)');

    $this->db->bind(':name', $data['name']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':date_reg_start', $data['date_reg_start']);
    $this->db->bind(':date_reg_end', $data['date_reg_end']);
    $this->db->bind(':activitystart', $data['activitystart']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':desc', $data['desc']); // Wrap `desc` in backticks
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':max_participants', $data['max_participants']);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


    public function deleteActivity($ac_id){
        $this->db->query('DELETE FROM activity WHERE ac_id = :ac_id');

        $this->db->bind(':ac_id', $ac_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function joinActivity($ac_id, $user_id)
{
    // Your existing code to fetch user details
    $this->db->query('SELECT * FROM users WHERE id = :user_id');
    $this->db->bind(':user_id', $user_id);
    $row = $this->db->single();

    $email = $row->email;

    // Fetch student profile based on email
    $this->db->query('SELECT * FROM st_profile WHERE st_email = :email');
    $this->db->bind(':email', $email);
    $row2 = $this->db->single();

    $st_id = $row2->st_id;
    $st_fullname = $row2->st_fullname;
    $st_email = $row2->st_email;
    $st_gender = $row2->st_gender;
    $univ_code = $row2->univ_code;
    $st_address = $row2->st_address;
    $st_ic = $row2->st_ic;

    // Fetch the max participant_id for the given ac_id
    $this->db->query('SELECT COALESCE(MAX(participant_id), 0) AS max_participant_id FROM activity_participants WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id', $ac_id);
    $row3 = $this->db->single();
    
    $max_participant_id = $row3->max_participant_id;

    // Increment the max_participant_id to get the new participant_id
    $participant_id = $max_participant_id + 1;

    // Insert the participant into the activity_participants table
    $this->db->query('INSERT INTO activity_participants (participant_id, ac_id, st_id, st_fullname, st_email, st_gender, univ_code, st_address, st_ic) VALUES (:participant_id, :ac_id, :st_id, :st_fullname, :st_email, :st_gender, :univ_code, :st_address, :st_ic)');

    $this->db->bind(':participant_id', $participant_id);
    $this->db->bind(':ac_id', $ac_id);
    $this->db->bind(':st_id', $st_id);
    $this->db->bind(':st_fullname', $st_fullname);
    $this->db->bind(':st_email', $st_email);
    $this->db->bind(':st_gender', $st_gender);
    $this->db->bind(':univ_code', $univ_code);
    $this->db->bind(':st_address', $st_address);
    $this->db->bind(':st_ic', $st_ic);

    return $this->db->execute();
}

    public function isStudentJoined($user_id, $ac_id)
    {
        // Fetch user details
        $this->db->query('SELECT * FROM users WHERE id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
    
        if (!$row) {
            // User not found, cannot be a student
            return false;
        }
    
        $email = $row->email;
    
        // Fetch student profile based on email
        $this->db->query('SELECT * FROM st_profile WHERE st_email = :email');
        $this->db->bind(':email', $email);
        $row2 = $this->db->single();
    
        // Check if the student profile exists
        if (!$row2) {
            // Student profile not found
            return false;
        }
    
        $st_id = $row2->st_id;
    
        // Check if the student is already a participant in the specified activity
        $this->db->query('SELECT * FROM activity_participants WHERE st_id = :st_id AND ac_id = :ac_id');
        $this->db->bind(':st_id', $st_id);
        $this->db->bind(':ac_id', $ac_id);
    
        return $this->db->single();
    }
    


   // Add a method to check if the registration date has ended
public function isRegistrationEnded($ac_id, $date_reg_end)
{
    $currentDate = date('Y-m-d');

    return $currentDate > $date_reg_end;
}

public function isRegistrationStarted($ac_id, $date_reg_start)
{
    $currentDate = date('Y-m-d');

    return $currentDate < $date_reg_start;
}

public function getParticipantNumber($ac_id)
{
    $this->db->query('SELECT COUNT(*) as count FROM activity_participants WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id', $ac_id);
    $current_participants = $this->db->single()->count;

    return $current_participants;
}

// Add a method to check if the activity is full
public function isActivityFull($ac_id)
{
    // Fetch the maximum number of participants for the activity from the 'activity' table
    $this->db->query('SELECT max_participants FROM activity WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id', $ac_id);
    $max_participants = $this->db->single()->max_participants;

    // Check the current number of participants for the activity
    $this->db->query('SELECT COUNT(*) as count FROM activity_participants WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id', $ac_id);
    $current_participants = $this->db->single()->count;

    // Check if the current number of participants is equal to or greater than the maximum
    return $current_participants >= $max_participants;
}



public function leaveActivity($ac_id, $user_id)
{
    $this->db->query('SELECT * FROM users WHERE  id = :user_id');

    $this->db->bind(':user_id', $user_id);

    $row = $this->db->single();
    
    $email = $row->email;

    $this->db->query('SELECT * FROM st_profile WHERE st_email = :email');

    $this->db->bind(':email', $email);

    $row2 = $this->db->single();

    $st_id = $row2->st_id;

    $this->db->query('DELETE FROM activity_participants WHERE ac_id = :ac_id AND st_id = :st_id');

    $this->db->bind(':ac_id', $ac_id);
    $this->db->bind(':st_id', $st_id);

    return $this->db->execute();

}

}
?>
