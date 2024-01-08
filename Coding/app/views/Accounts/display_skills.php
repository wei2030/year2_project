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

    <?php foreach($result as $skills):?>

        <button type="button" class="btn btn-secondary me-5" data-bs-toggle="popover" data-bs-placement="top" title="<?php echo $skills->skill_name;?>" data-bs-content="<?php echo $skills->skill_desc;?>">
        <img class="icon h-50px w-50px" src="<?php echo URLROOT ?>/public/<?php echo $skills->skill_dir; ?>" alt="Skill icon">
        </button>
        
        <?php $counter++; ?>

    <?php endforeach;

?>