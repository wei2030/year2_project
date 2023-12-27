<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Create Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/posts" class="btn btn-light-primary">Manage Activity</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">


        <form action="<?php echo URLROOT; ?>/activity/create" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name of Activity</label>
                <input type="text" name="name" class="form-control form-control-solid" placeholder="Name of Activity" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date</label>
                <input type="date" name="date" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Venue</label>
                <input type="text" name="venue" class="form-control form-control-solid" placeholder="Venue of Activity" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <input type="text" name="desc" required textarea name="body" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
