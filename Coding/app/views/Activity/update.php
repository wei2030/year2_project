<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
           
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/activity/update/<?php echo $data['activities']->ac_id ?>" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-solid"
                    value="<?php echo $data['activities']->name ?>" required />
            </div>

            <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Venue of Activity</label>
                <input type="text" name="venue" class="form-control form-control-solid"
                     value ="<?php echo $data['activities']->venue;?>">
                </div>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <input type="text" name="desc" required textarea name="body" class="form-control" aria-label="With textarea" required value ="<?php echo $data['activities']->desc;?>"></textarea>
                </div>
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
