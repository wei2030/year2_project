<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Update Personal Activity</h1>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
           
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
    <form action="<?php echo URLROOT; ?>/peractivity/update/<?php echo $data['perActivity']->pac_id ?>" method="POST"  enctype="multipart/form-data">
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
                    <textarea class="form-control form-control-solid" name="description" rows="3" value="<?php echo $data['perActivity']->description;?>"></textarea>
            </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Evidence (PDF Only)</label>
                <?php if (!empty($data['perActivity']->evidence)): ?>
    <p>Current Evidence: <?php echo $data['perActivity']->evidence; ?></p>
<?php endif; ?>


<input type="file" name="evidence" class="form-control form-control-solid" accept="application/pdf" />
                        
                <!-- <label for="exampleFormControlInput1" class="required form-label">Icon</label>
                <input type="text" name="icon_dir" class="form-control form-control-solid" placeholder="icon_dir..." required /> -->
            </div>


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </form>

    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
