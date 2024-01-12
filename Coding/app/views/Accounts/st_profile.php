<?php
foreach ($data['studentProfile'] as $studentProfile) :
?>
<?php endforeach; ?>

<div class="row">
    <!--begin::left side-->
    <div class="col-sm-3 col-lg-2">
    <!--begin::Pfp-->
        <div class="card shadow-sm">
        <div class="card-body">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')">
            <!--begin::Image preview wrapper-->
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')"></div>
            <!--end::Image preview wrapper-->
            </div>
        <!--end::Image input-->
        </div>
        </div>
    <!--end::Pfp-->
    <!--begin::info-->
    <div class="card shadow-sm card-px-0">
    <div class="card-header ml-5">
                <h4 class="card-title ls-3 fw-bold" style="margin-left:20px">INFO</h4>
                    <div class="card-toolbar">
                        <a href="<?php echo URLROOT . "/accounts/edit_profile"?>" class="btn btn-sm btn-warning" role="button" style="margin-right:10px">
                        Edit
                        </a>
                    </div>
            </div>
    <div class="card-body">
    <div class="flex-column">
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-danger me-5"></span> <?php echo $studentProfile->st_fullname ?> (<?php echo $studentProfile->st_gender; ?>)
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-warning me-5"></span> <?php echo $studentProfile->st_race; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-success me-5"></span> <?php echo $studentProfile->univ_code; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-primary me-5"></span> <?php echo $studentProfile->st_address; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical bg-info me-5"></span> <?php echo $_SESSION['email']; ?>
            </li>
            <li class="d-flex align-items-center py-2">
                <span class="bullet bullet-vertical me-5"></span> <?php echo $studentProfile->st_phone; ?>
            </li>
    </div>
    </div>
    </div>
    <!--end::info-->
    <!--start::activities-->
    <div class="card shadow-sm card-px-0">
    <div class="card-body" style="margin-left:15px; height:90px; padding-top: 12px;">
        <a href="<?php echo URLROOT; ?>/activity/joined" class="btn btn-flex px-2 hover-scale btn-active-primary" style="color:#000000">
            <i class="ki-duotone ki-graph-3 fs-2x"><span class="path1"></span><span class="path2"></span></i>
        <span class="d-flex flex-column align-items-start ms-2">
            <span class="fs-3 fw-bold">Activities</span>
            <span class="fs-7">View List</span>
        </span>
        </a>
    </div>
    </div>
    <!--end::activities-->
</div>
    <!--end::left side-->
    <div class="col-sm-9 col-lg-10">
        <!--start::description-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title ls-3 fw-bold">ABOUT ME</h4>
                    <div class="card-toolbar">
                        <a href="<?php echo URLROOT . "/accounts/edit_profile"?>" class="btn btn-sm btn-warning" role="button">
                        Edit
                        </a>
                    </div>
            </div>
            <div class="card-body card-scroll h-110px">
                <span class="ls-1" style="font-style:italic"><?php echo $studentProfile->about_me; ?></span>
            </div>
        </div>
        <!--end::description-->
        <br>
<div class="row">
<div class="col-sm-8 col-lg-8">
        <!--start::skill-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title ls-3 fw-bold">SKILLS</h4>
            </div>

            <div class="card-body">

                <?php include 'display_skills.php'?>
                
            </div>
        </div>
        <!--end::skill-->
</div>

<div class="col-sm-4 col-lg-4">
        <!-- start::badges-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title ls-3 fw-bold">BADGE</h4>
            </div>

            <div class="card-body" style="text-align:center">
                <?php if(isset($data_3['studentBadge']) && ($data_3['studentBadge'] != NULL)): ?>
                    <?php foreach ($data_3['studentBadge'] as $studentBadge) :?>
                        <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="<?php echo $studentBadge->badge_name; ?>">
                            <div class="symbol symbol-100px">
                                <img class="icon" src="<?php echo URLROOT ?>/public/<?php echo $studentBadge->icon_dir; ?>" alt="badge icon">
                            </div>
                        </button>
                    <?php endforeach; ?>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="iron">
                        <div class="symbol symbol-100px">
                            <img class="icon" src="<?php echo URLROOT ?>/public/assets/media/badges/iron.png" alt="badge icon">
                        </div>
                    </button>
                <?php endif; ?>
                
            </div>
        </div>
        <!--end::badges -->
</div>
</div>
</div>
