<?php

class perActivities
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAllperActivity() {
        $this->db->query('SELECT * FROM peractivity ORDER BY date ASC');
        $result = $this->db->resultSet();

        return $result;
    }

    public function findperActivityById($id)
    {
        $this->db->query('SELECT * FROM peractivity WHERE pac_id = :pac_id');
        $this->db->bind(':pac_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateperActivity($data)
{
    $this->db->query('UPDATE peractivity SET name = :name, venue = :venue, date = :date , `description` = :description WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $data['pac_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':date', $data['date']);
    $this->db->bind(':description', $data['description']);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

    

public function addperActivity($data)
{
    $this->db->query('INSERT INTO peractivity (st_id, name, date, venue, description, status, evidence) VALUES (:st_id, :name, :date, :venue, :description, "Waiting", :evidence)');

    // Bind values
    $this->db->bind(':st_id', $data['st_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':date', $data['date']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':evidence', $data['evidence']);

    // Execute the query
    return $this->db->execute();
}

    public function deleteperActivity($pac_id){
        $this->db->query('DELETE FROM peractivity WHERE pac_id = :pac_id');

        $this->db->bind(':pac_id', $pac_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    // In perActivities model
public function findApprovedPerActivities($st_id)
{
    $this->db->query('SELECT * FROM peractivity WHERE st_id = :st_id AND status = "Approved"');
    $this->db->bind(':st_id', $st_id);

    $result = $this->db->resultSet();

    return $result;
}

public function assignperActivity($data)
{
    $this->db->query('UPDATE peractivity SET lc_id = :lc_id WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $data['pac_id']);
    $this->db->bind(':lc_id', $data['lc_id']);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}


public function lecturerList()
{
    $this->db->query('SELECT * FROM lc_profile');

    $result = $this->db->resultSet();

    return $result;
}

public function findperActivityByLecturer($lc_id)
{
    $this->db->query('SELECT * FROM peractivity WHERE lc_id = :lc_id AND status = "Waiting"');
    $this->db->bind(':lc_id', $lc_id);

    $result = $this->db->resultSet();

   
    return $result;
}


public function WaitAllperActivity($st_id)
{
    $this->db->query('SELECT * FROM peractivity WHERE st_id = :st_id AND status = "Waiting" ORDER BY date ASC');
    $this->db->bind(':st_id', $st_id);

    $result = $this->db->resultSet();

    return $result;
}

public function setApprove($pac_id)
{
    $this->db->query('UPDATE peractivity SET status = "Approved" WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $pac_id);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

public function getStudentFullName($st_id)
{
    $this->db->query('SELECT st_fullname FROM st_profile WHERE st_id = :st_id');
    $this->db->bind(':st_id', $st_id);

    $row = $this->db->single();

    return $row ? $row->st_fullname : ''; // Return the full name if it exists, otherwise an empty string
}

public function getLecturerFullName($lc_id)
{
    $this->db->query('SELECT lc_fullname FROM lc_profile WHERE lc_id = :lc_id');
    $this->db->bind(':lc_id', $lc_id);

    $row = $this->db->single();

    return $row ? $row->lc_fullname : ''; // Return the full name if it exists, otherwise an empty string
}


}
?>
