<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Create Personal Activity</h1>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/peractivity" class="btn btn-bg-dark">Manage Personal Activity</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">


    <form action="<?php echo URLROOT; ?>/peractivity/create" method="POST"  enctype="multipart/form-data">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name of Personal Activity</label>
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
                    <input type="text" name="description" required textarea name="body" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Evidence (PDF Only)</label>

                <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                
                <div class="position-relative">
                    <input type="file" class="form-control" name="evidence" accept="application/pdf" required/>
                </div>

                <!-- <label for="exampleFormControlInput1" class="required form-label">Icon</label>
                <input type="text" name="icon_dir" class="form-control form-control-solid" placeholder="icon_dir..." required /> -->
            </div>



            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
