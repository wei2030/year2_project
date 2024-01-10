<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
           
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/peractivity/update/<?php echo $data['perActivity']->pac_id ?>" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-solid"
                    value="<?php echo $data['perActivity']->name ?>" required />
            </div>

            <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Venue of Activity</label>
                <input type="text" name="venue" class="form-control form-control-solid"
                     value ="<?php echo $data['perActivity']->venue;?>">
                </div>

                <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date</label>
                    <input type="date" name="date" class="form-control form-control-solid"
                     value ="<?php echo $data['perActivity']->date;?>">
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" name="description" required textarea name="body" class="form-control form-control-solid" aria-label="With textarea" required value ="<?php echo $data['perActivity']->description;?>"></textarea>
                </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Evidence</label>
                <?php if (!empty($data['perActivity']->evidence)): ?>
    <p>Current Evidence: <?php echo $data['perActivity']->evidence; ?></p>
<?php endif; ?>

                        
                <!-- <label for="exampleFormControlInput1" class="required form-label">Icon</label>
                <input type="text" name="icon_dir" class="form-control form-control-solid" placeholder="icon_dir..." required /> -->
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </form>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
