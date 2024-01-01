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
        $this->db->query('SELECT * FROM activity ORDER BY date ASC');
    
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

    public function updateActivity($data)
{
    $this->db->query('UPDATE activity SET name = :name, venue = :venue, `desc` = :desc WHERE ac_id = :ac_id');

    $this->db->bind(':ac_id', $data['ac_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':venue', $data['venue']);

    // Check if the "desc" key is present before binding
    if (array_key_exists('desc', $data)) {
        $this->db->bind(':desc', $data['desc']);
    }

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

    

    public function addActivity($data)
    {
        $this->db->query('INSERT INTO activity (name, date, venue, `desc`, user_id) VALUES (:name, :date, :venue, :desc, :user_id)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':desc', $data['desc']);
    
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
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
    
}

?>
