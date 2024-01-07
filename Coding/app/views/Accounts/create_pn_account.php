<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Create Partner Profile</h4>
        <div class="card-toolbar">
      
        </div>
    </div>
    <div class="card-body">
                                  
    <form action="<?php echo URLROOT; ?>/accounts/add_pn_account" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
    <div class="card-body border-top p-9">
        <!-- Username Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="userame" type="text" placeholder="Insert partner username..."/>
            </div>
        </div>

        <!-- Password Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="password" type="text" placeholder="Insert partner password..." />
            </div>
        </div>

        <!-- Avatar Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">Logo</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/images/users/admin@gmail.com/blank-pfp.png"; ?>')">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT. "/public/images/users/admin@gmail.com/blank-pfp.png"; ?>')"></div>
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
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="pn_name" type="text" placeholder="Insert partner name..."/>
            </div>
        </div>

        <!-- Email Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Address</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="pn_email" type="text" placeholder="Insert partner email..." />
            </div>
        </div>

        <!-- Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="pn_address" rows="3" placeholder="Insert partner address..." required></textarea>
            </div>
        </div>

        <!-- Phone Number Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Phone Number</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="pn_phone" type="text" placeholder="Insert partner phone..." />
            </div>
        </div>

        <!-- About Me Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">About me</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="about_me" rows="3" placeholder="Insert partner description..." required></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="create_partner" name="create_partner" value="create_partner">
            <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>


    </div>
</div>