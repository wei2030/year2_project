<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Create Badge</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                
                <a href="<?php echo URLROOT;?>/badges" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
                <!-- <a href="<?php echo URLROOT;?>/badges" class="btn btn-light-primary">Manage Badges</a> -->
            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/badges/create" method="POST" enctype="multipart/form-data">

            <div class="mb-10">
                <label for="badge_name" class="required form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" placeholder="Badge Name..." required />
            </div>

            <div class="mb-10">
                <label for="badge_desc" class="required form-label">Badge Description</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <textarea name="badge_desc" class="form-control" aria-label="With textarea" placeholder="Badge Description..." required></textarea>
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