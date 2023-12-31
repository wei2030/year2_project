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

    $counter = 0;

    ?>

    <?php foreach($result as $skills):
        
        if ($counter < 10){
        ?>

        <h6 class="fw-light"><img class="icon h-25px w-25px" src="<?php echo URLROOT ?>/public/<?php echo $skills->skill_dir; ?>" alt="Skill icon"><?php echo $skills->skill_name?></h6>
        
        <?php $counter++; ?>

        <?php }else{ ?>
		<li class="list-inline-item"><span class="badge badge-light"><?php echo $skills->skill_name;?></span></li>
    <?php }
    endforeach;
?>