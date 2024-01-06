<?php

    $this->db = new Database;

    $this->db->query(

        'SELECT s.skill_name, s.skill_desc, s.skill_dir
        FROM stud_skills AS ss
        INNER JOIN skills AS s ON ss.skill_id = s.skill_id
        WHERE st_id = :st_id'

    );

    $this->db->bind(':st_id', $studentProfile->st_id);

    $result = $this->db->resultSet();

    $allSkills = $result->fetch_assoc();

    $counter = 0;
    foreach($allSkills as $skills) {

        if($counter % 3 == 0){
            echo "<div class="row g-3">";
        }

        echo "<div class="col">";
            echo "<div class="card card-stretch-50 card-bordered mb-5">";

                echo "<div class="card-header">";
                    echo "<img class="icon" src="<?php echo URLROOT ?>/public/<?php echo $skills->skill_dir; ?>" alt="Skill icon">"
                echo "</div>";

                echo "<div class="card-body">";
                    echo "<h2 class="m-grid-col-middle m-grid-col-center"><?php echo $skills->skill_name;?></h2>";
                    echo "<h3 class="m-grid-col-middle m-grid-col-center"><?php echo $skills->skill_desc;?></h3>";
                echo "</div>";

            echo "</div>";
        echo "</div>";

        if($counter % 3 == 0){
            echo "</div>";
        }
        
        $counter++;
    }

    

    $sql = "SELECT * FROM badges WHERE badge_name = $badge_name";
    $result = $conn->query($sql);

    $badge = $result->fetch_assoc();

?>