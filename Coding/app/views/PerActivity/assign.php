<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Assign Yor Activity To : </h1>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/peractivity" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/peractivity/assign/<?php echo $data['pac_id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-10">
                <label for="lecturer">Lecturer:</label>
                <select class="form-control selectpicker" id="lecturer" name="lc_id" data-live-search="true" required>
                    <?php foreach ($data_2['lc_list'] as $row): ?>
                        <option value="<?php echo $row->lc_id; ?>">
                            <?php echo $row->lc_fullname; ?> [<?php echo $row->lc_id; ?>]
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
        </form>
    </div>
</div>

<div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
