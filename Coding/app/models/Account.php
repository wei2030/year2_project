<?php 

class Account 
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}

?>