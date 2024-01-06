<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Create Skill</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                
                <a href="<?php echo URLROOT;?>/skills" class="btn btn-light-primary"><i class="fa fa-home"></i></a>

            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/skills/create" method="POST" enctype="multipart/form-data">

            <div class="mb-10">
                <label for="skill_name" class="required form-label">Skill Name</label>
                <input type="text" name="skill_name" class="form-control form-control-solid" placeholder="Skill Name..." required />
            </div>

            <div class="mb-10">
                <label for="skill_desc" class="required form-label">Skill Description</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <textarea name="skill_desc" class="form-control" aria-label="With textarea" placeholder="Skill Description..." required></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Icon</label>

                <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                
                <div class="position-relative">
                    <input type="file" class="form-control" name="image">
                </div>

            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>