<?php
foreach ($data['lecturerProfile'] as $lecturerProfile) :
?>
<?php endforeach; ?>

<div class="row">
    <!--begin::left side-->
    <div class="col-sm-3 col-lg-2">
    <!--begin::Pfp-->
        <div class="card shadow-sm">
        <div class="card-body">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true"     yle="background-image: url('<?php echo URLROOT."/public/".$lecturerProfile->lc_image; ?>')">
            <!--begin::Image preview wrapper-->
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$lecturerProfile->lc_image; ?>')"></div>
            <!--end::Image preview wrapper-->
            </div>
        <!--end::Image input-->
        </div>
        </div>
    <!--end::Pfp-->
    <!--begin::info-->
    <div class="card shadow-sm card-px-0">
    <div class="card-header ml-5">
                <h4 class="card-title" style="margin-left:20px">My Info</h4>
                    <div class="card-toolbar">
                        <a href="<?php echo URLROOT . "/accounts/edit_profile"?>" class="btn btn-sm btn-light" role="button" style="margin-right:10px">
                        Edit
                        </a>
                    </div>
            </div>
    <div class="card-body">
    <div class="flex-column">
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-danger me-5"></span> <?php echo $lecturerProfile->lc_fullname ?> (<?php echo $lecturerProfile->lc_gender; ?>)
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-warning me-5"></span> <?php echo $lecturerProfile->lc_race; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-success me-5"></span> <?php echo $lecturerProfile->univ_code; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-primary me-5"></span> <?php echo $lecturerProfile->lc_address; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical me-5"></span> <?php echo $_SESSION['email']; ?>
            </li>
    </div>
    </div>
    </div>
    <!--end::info-->
</div>
    <!--end::left side-->
    <div class="col-sm-9 col-lg-10">
        <!--start::description-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title">About Me</h4>
                    <div class="card-toolbar">
                        <a href="<?php echo URLROOT . "/accounts/edit_profile"?>" class="btn btn-sm btn-light" role="button">
                        Edit
                        </a>
                    </div>
            </div>
            <div class="card-body card-scroll h-110px">
                <?php echo $lecturerProfile->about_me; ?>
            </div>
        </div>
        <!--end::description-->
        <br>
</div>
</div>