<?php

    $this->db = new Database;

    $this->db->query("SELECT SUM(ac_id) FROM activity WHERE st_id = :st_id");
    $this->db->bind(':st_id', $studentProfile->st_id);

    $result = $this->db->resultSet();

    $total = $result->fetch_assoc();

    $num_activity = $total['SUM(ac_id)'];

    if($num_activity >= 0 || $num_activity <= 9) {
        $badge_name = 'Iron';
    } elseif($num_activity >= 10 || $num_activity <= 19) {
        $badge_name = 'Bronze';
    } elseif($num_activity >= 20 || $num_activity <= 29) {
        $badge_name = 'Bronze';
    } elseif($num_activity >= 30 || $num_activity <= 39) {
        $badge_name = 'Bronze';
    } elseif($num_activity >= 40 || $num_activity <= 49) {
        $badge_name = 'Bronze';
    } elseif($num_activity >= 50 || $num_activity <= 59) {
        $badge_name = 'Bronze';
    } else {
        $badge_name = 'Adventurer';
    }

    $sql = "SELECT * FROM badges WHERE badge_name = $badge_name";
    $result = $conn->query($sql);

    $badge = $result->fetch_assoc();

?>