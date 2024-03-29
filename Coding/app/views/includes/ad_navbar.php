<div class="app-navbar flex-shrink-0">								
								<!--begin::User menu-->
								<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['user_pfp']; ?>')">
												<div class="image-input-wrapper w-35px h-35px" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['user_pfp']; ?>')"></div>
												</div>
									</div>
									<!--begin::User account menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
												<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['user_pfp']; ?>')">
												<div class="image-input-wrapper w-50px h-50px" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['user_pfp']; ?>')"></div>
												</div>
												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5"><?php echo $_SESSION['username']?>
													<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"><?php echo $_SESSION['user_role'] ?></span></div>
													<a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?php echo $_SESSION['email'] ?></a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="<?php echo URLROOT; ?>/accounts" class="menu-link px-5">My Profile</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--end::Menu item-->
										
										<!--begin::Menu item-->
										<div class="menu-item px-5">
										
                                            <?php if(isset($_SESSION['user_id'])) : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/logout" class="menu-link px-5">Log out</a>
                                                <?php else : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/login" class="menu-link px-5">Login</a>
                                                <?php endif; ?>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::User account menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User menu-->
								<!--begin::Header menu toggle-->
								<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
									<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
										<i class="ki-duotone ki-element-4 fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</div>
								</div>
								<!--end::Header menu toggle-->
								<!--begin::Aside toggle-->
								<!--end::Header menu toggle-->
							</div>