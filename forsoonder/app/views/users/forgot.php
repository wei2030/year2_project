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
				<!--begin::Forgot-->
				<div class="login-form ">
					<!--begin::Form-->
					<form action="<?php echo URLROOT; ?>/users/forgot" method="POST" class="form" novalidate="novalidate" id="kt_login_forgot_form">
						<!--begin::Title-->
						<div class="pb-13 pt-lg-0 pt-5">
							<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgot Your Password ?</h3>
							<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
						
						</div>
						<!--end::Title-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
							<?php if ($data['emailError'] != "") { ?>
								<span class="label label-inline label-danger font-weight-bolder"><?php echo $data['emailError']; ?></span>
							<?php } ?>
							<?php if ($data['emailSuccess'] != "") { ?>
								<div class="alert alert-success" role="alert">
								<?php echo $data['emailSuccess']; ?>
								</div>
							<?php } ?>
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group d-flex flex-wrap pb-lg-0">
							<button type="submit" name="reset-request" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
							<a href="https://localhost/mvcprojectnew/users/login" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
						</div>
						<!--end::Form group-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Forgot-->
			</div>
			<!--end::Content body-->
			<?php

			require APPROOT . '/views/includes/footer_l.php';

			?>