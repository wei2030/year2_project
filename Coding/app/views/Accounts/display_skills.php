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

        <?php if($counter % 3 == 0): ?>
            <div class="row g-3">
        <?php endif; ?>

        <div class="col">
            <div class="card card-stretch-50 card-bordered mb-5">

                <div class="card-header">
                    <img class="icon" src="<?php echo URLROOT ?>/public/<?php echo $skills->skill_dir; ?>" alt="Skill icon">
                </div>

                <div class="card-body">
                    <h4><?php echo $skills->skill_name;?></h4>
                    <h6><?php echo $skills->skill_desc;?></h6>
                </div>

            </div>
        </div>

        <?php if($counter % 3 == 0): ?>
            </div>
        <?php endif; ?>
        
        <?php $counter++; ?>

    <?php endforeach;

?>