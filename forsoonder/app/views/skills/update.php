<div class="card shadow-sm">

    <div class="card-header">

        <h3 class="card-title">Update Skill</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/skills" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
            <?php endif; ?>
        </div>

    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/skills/update/<?php echo $data['skill']->skill_id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-10">
                <label for="skill_name" class="form-label">Skill Name</label>
                <input type="text" name="skill_name" class="form-control form-control-solid" value="<?php echo $data['skill']->skill_name ?>" required />

                <span class="invalidFeedback">
                    <?php echo $data['skill_name_Error']; ?>
                </span>
            </div>

            <div class="mb-10">
                <label for="skill_desc" class="form-label">Skill Description</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <textarea name="skill_desc" class="form-control" aria-label="With textarea" required><?php echo $data['skill']->skill_desc;?></textarea>
                </div>

                <span class="invalidFeedback">
                    <?php echo $data['skill_desc_Error']; ?>
                </span>
            </div>

            <div class="mb-10">
                <label for="existing_icon" class="form-label">Existing Icon</label>
                <input type="text" name="existing_icon" class="form-control form-control-solid" value="<?php echo $data['skill']->skill_dir; ?>" disabled/>
            </div>

            <div class="mb-10">
                <label for="image" class="form-label">New Icon ( * if any )</label>

                <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                
                <div class="position-relative">
                    <input type="file" name="image" class="form-control form-control-solid"/>                  
                </div>

                <span class="invalidFeedback">
                    <?php echo $data['skill_dir_Error']; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>