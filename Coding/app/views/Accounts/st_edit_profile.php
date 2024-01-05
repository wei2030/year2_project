<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Edit Profile</h4>
        <div class="card-toolbar">
      
        </div>
    </div>
    <div class="card-body">

    <?php
    foreach ($data['studentProfile'] as $studentProfile) :
    ?>
    <?php endforeach; ?>
                                  
    <form action="<?php echo URLROOT; ?>/accounts/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
    <div class="card-body border-top p-9">
        <!-- Avatar Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6" style="margin-left:15px"><span class="path1"></span><span class="path2"></span></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>

        <!-- Full Name Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="st_fullname" type="text" required value="<?php echo $studentProfile->st_fullname; ?>" />
            </div>
        </div>

        <!-- IC Number Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">IC Number</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="st_ic" type="text" required value="<?php echo $studentProfile->st_ic; ?>" />
            </div>
        </div>

        <!-- Email Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Address</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="st_email" type="text" readonly value="<?php echo $studentProfile->st_email; ?>" />
            </div>
        </div>

        <!-- Gender Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Gender</label>
            <div class="col-lg-8">
                <select class="form-select form-select-solid form-select-lg" name="st_gender">
                    <option value="<?php echo $studentProfile->st_gender ?>"><?php echo $studentProfile->st_gender ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>

        <!-- Race Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Race</label>
            <div class="col-lg-8">
                <select class="form-select form-select-solid form-select-lg" name="st_race">
                    <option value="<?php echo $studentProfile->st_race ?>"><?php echo $studentProfile->st_race ?></option>
                    <option value="Malay">Malay</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Indian">Indian</option>
                    <option value="Others">Others</option>
                    <!-- Additional options here -->
                </select>
            </div>
        </div>

        <!-- Institution of Higher Learning Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Institution of Higher Learning</label>
            <div class="col-lg-8">
                <select class="form-select form-select-solid form-select-lg" name="univ_code">
                    <option value="UTM">UTM</option>
                    <option value="UM">UM</option>
                    <option value="UPM">UPM</option>
                    <option value="UKM">UKM</option>
                    <option value="USM">USM</option>
                    <!-- Additional options here -->
                </select>
            </div>
        </div>

        <!-- Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="st_address" rows="3" required><?php echo $studentProfile->st_address ?></textarea>
            </div>
        </div>

        <!-- About Me Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">About me</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="about_me" rows="3" required><?php echo $studentProfile->about_me ?></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="update_student" name="update_student" value="update_student">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>


    </div>
</div>