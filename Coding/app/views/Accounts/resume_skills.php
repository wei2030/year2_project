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
        
        if ($counter < 5){
        ?>

        <h6 class="fw-light"><img class="icon h-20px w-20px" src="<?php echo URLROOT ?>/public/<?php echo $skills->skill_dir; ?>" alt="Skill icon"><span style="margin-left:5px"><?php echo $skills->skill_name?></span></h6>
        
        <?php $counter++; ?>

        <?php }else{ ?>
		<li class="list-inline-item"><span class="badge badge-light"><?php echo $skills->skill_name;?></span></li>
    <?php }
    endforeach;
?>