<?php

class Feedbacks
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showAllFeedback()
    {
        $this->db->query('SELECT f.*, a.* FROM feedback f
                          JOIN activity a ON f.ac_id = a.ac_id
                          WHERE f.status = "Waiting"');
        
        $result = $this->db->resultSet();
    
        return $result;
    }
    

    public function findAllFeedback($st_id)
    {
        $this->db->query("SELECT * FROM feedback WHERE st_id = :st_id ORDER BY feedback_id DESC");
        $this->db->bind(':st_id', $st_id);
        
        $result = $this->db->resultSet();
    
        return $result;
    }
    


    public function findFeedbackByActivityId($ac_id)
    {
        $this->db->query('SELECT f.*, a.* FROM feedback f
                          JOIN activity a ON f.ac_id = a.ac_id
                          WHERE f.ac_id = :ac_id AND f.status = "Waiting"');
        $this->db->bind(':ac_id', $ac_id);
    
        $result = $this->db->resultSet();
    
        // Check if a result is found
        if ($result) {
            return $result;
        } else {
            // Handle the case where no result is found
            return null; // or an empty array/object, depending on your needs
        }
    }
    
    
    
    


    public function deleteFeedback($feedback_id){
        $this->db->query('DELETE FROM feedback WHERE feedback_id = :feedback_id');

        $this->db->bind(':feedback_id', $feedback_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    public function setApprove($feedback_id)
{
    $this->db->query('UPDATE feedback SET status = "Approved" WHERE feedback_id = :feedback_id');

    $this->db->bind(':feedback_id', $feedback_id);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

   // Add a method to check if the registration date has ended

public function getParticipantNumber($ac_id)
{
    $this->db->query('SELECT COUNT(*) as count FROM activity_participants WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id', $ac_id);
    $current_participants = $this->db->single()->count;

    return $current_participants;
}
 


public function getStudentID($user_id) {
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

    return $st_id;
}

public function getLecturerID($user_id) {
    // Fetch user details
    $this->db->query('SELECT * FROM users WHERE id = :user_id');
    $this->db->bind(':user_id', $user_id);
    $user = $this->db->single();

    // Check if user exists
    if (!$user) {
        return false;
    }

    $email = $user->email;

    // Fetch lecturer profile based on email
    $this->db->query('SELECT * FROM lc_profile WHERE lc_email = :email');
    $this->db->bind(':email', $email);
    $lecturerProfile = $this->db->single();

    // Check if the lecturer profile exists
    if (!$lecturerProfile) {
        return false;
    }

    return $lecturerProfile->lc_id;
}

public function nameList()
{
    $this->db->query('SELECT * FROM activity WHERE name = :name');

    $result = $this->db->resultSet();

    return $result;
}

public function showFeedbackByACID($st_id) {
    $this->db->query('SELECT f.*, a.* FROM feedback f
                      JOIN activity a ON f.ac_id = a.ac_id
                      WHERE f.st_id = :st_id AND f.status = "Waiting"');
    $this->db->bind(':st_id', $st_id);

    $result = $this->db->resultSet();

    // Check if a result is found
    if ($result) {
        return $result;
    } else {
        // Handle the case where no result is found
        return null; // or an empty array/object, depending on your needs
    }
}


public function showFeedbackDetails($ac_id) {
    $this->db->query('SELECT * FROM feedback WHERE ac_id = :ac_id');
    $this->db->bind(':ac_id',$ac_id);
    $result = $this->db->resultSet();

    return $result;
}

public function findFeedbackById($feedback_id)
{
    $this->db->query('SELECT * FROM feedback WHERE feedback_id = :feedback_id');
    $this->db->bind(':feedback_id', $feedback_id);

    $row = $this->db->single();

    return $row;
}

public function updateFeedback($data)
{
    $this->db->query('UPDATE feedback SET st_fullname = :st_fullname, univ_code = :univ_code, q1 = :q1, q2 = :q2, q3 = :q3, content_q1 = :content_q1, content_q2 = :content_q2, content_q3 = :content_q3, presenter_q1 = :presenter_q1, presenter_q2 = :presenter_q2, presenter_q3 = :presenter_q3, projectFile = :projectFile WHERE feedback_id = :feedback_id'
    );

    // Bind values
    $this->db->bind(':feedback_id', $data['feedback_id']);
    $this->db->bind(':st_fullname', $data['st_fullname']);
    $this->db->bind(':univ_code', $data['univ_code']);
    $this->db->bind(':q1', $data['q1']);
    $this->db->bind(':q2', $data['q2']);
    $this->db->bind(':q3', $data['q3']);
    $this->db->bind(':content_q1', $data['content_q1']);
    $this->db->bind(':content_q2', $data['content_q2']);
    $this->db->bind(':content_q3', $data['content_q3']);
    $this->db->bind(':presenter_q1', $data['presenter_q1']);
    $this->db->bind(':presenter_q2', $data['presenter_q2']);
    $this->db->bind(':presenter_q3', $data['presenter_q3']);
    $this->db->bind(':projectFile', $data['projectFile']);

    // Execute the query and handle the result (if needed)
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


public function findActivityByID($feedback_id)
{
    // Prepare the SQL query
    $this->db->query('SELECT ac_id FROM feedback WHERE feedback_id = :feedback_id');
    
    // Bind the feedback_id parameter to the query
    $this->db->bind(':feedback_id', $feedback_id);

    // Execute the query and retrieve a single row
    $row = $this->db->single();

    // Return the value of ac_id from the retrieved row
    return $row->ac_id;
}

public function findApprovedFeedback($st_id)
{
    $this->db->query('SELECT f.*, a.* FROM feedback f
                      JOIN activity a ON f.ac_id = a.ac_id
                      WHERE f.st_id = :st_id AND f.status = "Approved"
                      ORDER BY f.feedback_id DESC');
    $this->db->bind(':st_id', $st_id);
    
    $result = $this->db->resultSet();
    
    return $result;
}

public function showAllApproved() {
    $this->db->query('SELECT f.*, a.* FROM feedback f
                      JOIN activity a ON f.ac_id = a.ac_id
                      WHERE f.status = "Approved"');
    
    $result = $this->db->resultSet();
    
    return $result;
}





}
?>
