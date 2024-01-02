<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
           
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/peractivity/update/<?php echo $data['peractivities']->ac_id ?>" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-solid"
                    value="<?php echo $data['peractivities']->name ?>" required />
            </div>

            <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Venue of Activity</label>
                <input type="text" name="venue" class="form-control form-control-solid"
                     value ="<?php echo $data['peractivities']->venue;?>">
                </div>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <input type="text" name="description" required textarea name="body" class="form-control" aria-label="With textarea" required value ="<?php echo $data['activities']->desc;?>"></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Evidence</label>

                <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                
                <div class="position-relative">
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- <label for="exampleFormControlInput1" class="required form-label">Icon</label>
                <input type="text" name="icon_dir" class="form-control form-control-solid" placeholder="icon_dir..." required /> -->
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
