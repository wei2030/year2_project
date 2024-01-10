<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Assign this personal activity to:</h3>
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
