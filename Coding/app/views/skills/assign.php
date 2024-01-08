<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Assign this skill to:</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                
                <a href="<?php echo URLROOT;?>/skills" class="btn btn-light-primary"><i class="fa fa-home"></i></a>

            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/skills/assign/<?php echo $data['skill']->skill_id ?>" method="POST" enctype="multipart/form-data">

            <div class="mb-10">
                <label for="student">Student:</label>
                <select class="form-control selectpicker" id="student" name="st_id" data-live-search="true" required>
                    <?php foreach ($data_2['stu_list'] as $row): ?>
                        <option value="<?php echo $row->st_id; ?>">
                            <?php echo $row->st_fullname; ?> [<?php echo $row->st_id; ?>]
                        </option>
                    <?php endforeach ?>
                </select>
            </div> 
            
            <div class="mb-10">
                <label for="student">Skill:</label>
                <select class="form-control selectpicker" id="skill" name="skill_id" data-live-search="true" required>
                    <option value="<?php echo $data['skill']->skill_id; ?>">
                        <?php echo $data['skill']->skill_name; ?>
                    </option>
                </select>
            </div> 

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>