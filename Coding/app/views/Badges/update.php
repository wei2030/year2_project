<div class="card shadow-sm">

    <div class="card-header">

        <h3 class="card-title">Update Badge</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/badges" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
                <!-- <a href="<?php echo URLROOT;?>/posts" class="btn btn-light-primary">Manage Posts</a> -->
            <?php endif; ?>
        </div>

    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/badges/update/<?php echo $data['badge']->badge_id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-10">
                <label for="badge_name" class="required form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" value="<?php echo $data['badge']->badge_name ?>" required />
            </div>

            <div class="mb-10">
                <label for="badge_desc" class="required form-label">Badge Description</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <textarea name="badge_desc" class="form-control" aria-label="With textarea" required><?php echo $data['badge']->badge_desc;?></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="existing_icon" class="form-label">Existing Icon</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" value="<?php echo $data['badge']->icon_dir; ?>" readonly/>
            </div>

            <div class="mb-10">
                <label for="icon_dir" class="required form-label">New Icon ( * if any )</label>
                <div class="position-relative">
                    <input type="file" name="icon_dir" class="form-control form-control-solid"/>                  
                </div>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>