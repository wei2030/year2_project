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
                <span class="bullet bullet-vertical me-5"></span> <?php echo $_SESSION['email']; ?>
            </li>
    </div>
    </div>
    </div>
    <!--end::info-->
    <!--start::activities-->
    <div class="card shadow-sm card-px-0">
    <div class="card-body" style="margin-left:14px">
        <a href="#" class="btn btn-flex px-2 hover-scale btn-active-primary">
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
                <h4 class="card-title">About Me</h4>
                    <div class="card-toolbar">
                        <a href="<?php echo URLROOT . "/accounts/edit_about"?>" class="btn btn-sm btn-light" role="button">
                        Edit
                        </a>
                    </div>
            </div>
            <div class="card-body card-scroll h-110px">
                About Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
        <!--end::description-->
        <br>
<div class="row">
<div class="col-sm-6 col-lg-6">
        <!--start::skill-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title">Skills</h4>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 1" data-bs-content="Description of skill 1">
                Skill 1
            </button>
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 2" data-bs-content="Description of skill 2">
                Skill 2
            </button>
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 3" data-bs-content="Description of skill 3">
                Skill 3
            </button>
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 4" data-bs-content="Description of skill 4">
                Skill 4
            </button>
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 5" data-bs-content="Description of skill 5">
                Skill 5
            </button>
            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Skill 6" data-bs-content="Description of skill 6">
                Skill 6
            </button>
            </div>
        </div>
        <!--end::skill-->
</div>
<div class="col-sm-6 col-lg-6">
        <!--start::badges-->
        <div class="card shadow-sm card-dashed">
            <div class="card-header">
                <h4 class="card-title">Badges</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Github" data-bs-content="Description of Badge">
                <div class="symbol symbol-50px">
                    <img src="<?php echo URLROOT ?>/public/assets/media/svg/social-logos/github.svg" alt=""/>
                </div>
                </button>
                <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Youtube" data-bs-content="Description of Badge">
                <div class="symbol symbol-50px">
                    <img src="<?php echo URLROOT ?>/public/assets/media/svg/social-logos/youtube.svg" alt=""/>
                </div>
                </button>
                <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Dribbble" data-bs-content="Description of Badge">
                <div class="symbol symbol-50px">
                    <img src="<?php echo URLROOT ?>/public/assets/media/svg/social-logos/dribbble.svg" alt=""/>
                </div>
                <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="Github" data-bs-content="Description of Badge">
                <div class="symbol symbol-50px">
                    <img src="<?php echo URLROOT ?>/public/assets/media/svg/social-logos/twitter.svg" alt=""/>
                </div>
                </button>
                </button>
            </div>
        </div>
        <!--start::badges-->
</div>
</div>

