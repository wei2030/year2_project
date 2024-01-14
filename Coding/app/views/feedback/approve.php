<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Assign skills to student:</h3>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/feedback/approve/<?php echo $data['feedback']->feedback_id ?>" method="POST" enctype="multipart/form-data">

            <div class="mb-10">
                <label for="student">Student:</label>
                <select class="form-control selectpicker" id="student" name="st_id" data-live-search="true" required>
                    <?php foreach ($data_2['stu_list'] as $stu): ?>
                        <option value="<?php echo $stu->st_id; ?>">
                            <?php echo $stu->st_fullname; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div> 
            
            <div class="mb-10">
                <label for="student">Skill:</label>
                <select class="form-control selectpicker" id="skill" name="skill_id" data-live-search="true" required>
                    <?php foreach ($data_3['skill_list'] as $row): ?>
                        <option value="<?php echo $row->skill_id; ?>">
                            <?php echo $row->skill_name; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>