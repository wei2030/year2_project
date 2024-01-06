<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Activity</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/activity" class="btn btn-light-primary">Manage Activity</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">

    <form action="<?php echo $data['u_url']; ?>" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name of Activity</label>
                <input type="text" name="name" class="form-control form-control-solid" value="<?php echo $data['activities']->name; ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Registration Start</label>
                <input type="date" name="date_reg_start" class="form-control form-control-solid" value="<?php echo date('Y-m-d', strtotime($data['activities']->date_reg_start)); ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Registration End</label>
                <input type="date" name="date_reg_end" class="form-control form-control-solid" value="<?php echo date('Y-m-d', strtotime($data['activities']->date_reg_end)); ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Activity Start</label>
                <input type="date" name="activitystart" class="form-control form-control-solid" value="<?php echo date('Y-m-d', strtotime($data['activities']->activitystart)); ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Venue</label>
                <input type="text" name="venue" class="form-control form-control-solid" value="<?php echo $data['activities']->venue; ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Description</label>
                <textarea name="desc" class="form-control form-control-solid" placeholder="Description" aria-label="With textarea" required><?php echo $data['activities']->desc; ?></textarea>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Maximum Participants</label>
                <input type="number" name="max_participants" class="form-control form-control-solid" value="<?php echo $data['activities']->max_participants; ?>" required />
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Update</button>

        </form>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
