<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Create Activity</h1>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/activity" class="btn btn-light-primary">Manage Activity</a>
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
        <label for="exampleFormControlInput1" class="required form-label">Category</label>
        <select name="category" class="form-control form-control-solid" required>
            <option value="Competition / Scholarship">Competition / Scholarship </option>
            <option value="Program / Activities">Program / Activities</option>
            <option value="Bootcamp / Workshop">Bootcamp / Workshop</option>
            <option value="Part Time">Part Time</option>
            <option value="Volunteering">Volunteering</option>
            <option value="Internship">Internship</option>
        </select>
    </div>


            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Registration Start</label>
                <input type="date" name="date_reg_start" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Registration End</label>
                <input type="date" name="date_reg_end" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Activity Start</label>
                <input type="date" name="activitystart" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date Activity End</label>
                <input type="date" name="activityend" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Venue</label>
                <input type="text" name="venue" class="form-control form-control-solid" placeholder="Venue of Activity" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Description</label>
                <textarea name="desc" class="form-control form-control-solid" placeholder="Description" aria-label="With textarea" required></textarea>
            </div>

            <div class="mb-10">
                <label for="max_participants" class="required form-label">Maximum Participants</label>
                <input type="number" name="max_participants" class="form-control form-control-solid" placeholder="Maximum Participants" required />
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
