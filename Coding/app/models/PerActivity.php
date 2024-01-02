<?php

class perActivities
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllperActivity()
    {
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
    $this->db->query('UPDATE peractivity SET name = :name, venue = :venue, `desc` = :desc, evidence = :evidence WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $data['pac_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':evidence', $data['evidence']);

    // Check if the "desc" key is present before binding
    if (array_key_exists('desc', $data)) {
        $this->db->bind(':desc', $data['desc']);
    }

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

    

    public function addActivity($data)
    {
        $this->db->query('INSERT INTO activity (name, date, venue, `desc`, evidence, id) VALUES (:name, :date, :venue, :desc, evidence, :id)');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':desc', $data['desc']);
        $this->db->bind(':evidence', $data['evidence']);
        
    
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
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
    
}

?>
