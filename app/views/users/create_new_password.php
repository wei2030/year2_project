<?php

require APPROOT . '/views/includes/head_l.php';

?>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="text-center mb-10">
                    <img src="<?php echo URLROOT ?>/public/assets/media/logos/ideakpt.png" class="max-h-70px" alt="" />
                </a>
                <!--end::Aside header-->
                <!--begin::Aside title-->
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">IDEA@KPT
                    <br />Bookkeeping Software (Beta)
                </h3>
                <!--end::Aside title-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(<?php echo URLROOT ?>/public/assets/media/svg/illustrations/login-visual-1.svg)"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signup-->
                <div class="login-form ">
                    <!--begin::Form-->
                    <?php

                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https://";
                    else
                        $url = "http://";
                    // Append the host(domain name, ip) to the URL.   
                    $url .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL   
                    $url .= $_SERVER['REQUEST_URI'];

                    $_SESSION['url_token'] = $url;
                    ?>

                    <form action="<?php echo URLROOT; ?>/users/create_new_password" method="POST" class="form" novalidate="novalidate" id="kt_login_signup_form">
                        <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">New Password</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Create your new password</p>

                            <?php if ($data['tokenError'] != "") { ?>
                                <span class="label label-inline label-danger font-weight-bolder"><?php echo $data['tokenError']; ?></span>
                            <?php } ?>
                            <?php if ($data['tokenSuccess'] != "") { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $data['tokenSuccess']; ?>
                                </div>
                                <a href="<?php echo URLROOT; ?>/users/login" class="text-primary font-weight-bolder">Go back to login page</a></span>
                            <?php } ?>
                        </div>
                        <!--end::Title-->

                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" />
                            <span class="form-text text-muted">Password format: <code>thisisdummypassword8312323232</code></span>
                            <?php if ($_SESSION['passwordError'] != "") { ?>
                                <span class="label label-inline label-danger font-weight-bolder"><?php echo $_SESSION['passwordError']; ?></span>
                            <?php 
                           // unset($_SESSION['passwordError']);
                        }
                            
                            ?>

                        </div>

                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="confirmPassword" autocomplete="off" />
                            <?php if ($_SESSION['confirmPasswordError'] != "") { ?>
                                <span class="label label-inline label-danger font-weight-bolder"><?php echo $_SESSION['confirmPasswordError']; ?></span>
                                <?php 
                               // unset($_SESSION['confirmPasswordError']);
                            }
                            
                            ?>
                        </div>

                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                            <input type="hidden" id="sv" name="selector" value="<?php echo $selector ?>">
                            <input type="hidden" id="sv" name="validator" value="<?php echo $validator ?>">
                            <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                            <a href="https://ideakpt.my/sys/users/login" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                        </div>
                        <!--end::Form group-->
                    </form>
                    <!--end::Form-->
                    <?php
                    //  }
                    //  }
                    ?>

                </div>
                <!--end::Signup-->
            </div>
            <!--end::Content body-->
            <?php

            require APPROOT . '/views/includes/footer_l.php';

            ?>