<?php

class EventModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getEventsForMonth($year, $month) {
        $this->db->query("SELECT * FROM activity WHERE YEAR(date) = :year AND MONTH(date) = :month");
        $this->db->bind(':year', $year);
        $this->db->bind(':month', $month);

        return $this->db->resultSet();
    }
}
