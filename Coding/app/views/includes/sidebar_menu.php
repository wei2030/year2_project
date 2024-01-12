<div class="app-sidebar-menu overflow-hidden flex-column-fluid" style="background-image: linear-gradient(to right, #183D64, #7C1C2B);">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
								<!--begin::Scroll wrapper-->
								<div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
									<!--begin::Menu-->
									<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

										<!--begin:Menu item (User)-->
										<?php if($_SESSION['user_role'] == "Admin" || $_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Partner"): ?>
											<div data-kt-menu-trigger="click" class="menu-item menu-accordion">

												<!--begin:Menu link-->
												<span class="menu-link">
													<span class="menu-icon">
														<i class="ki-duotone ki-element-7 fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">User</span>
													<span class="menu-arrow"></span>
												</span>
												<!--end:Menu link-->

												<!--begin:Menu sub-->
												<div class="menu-sub menu-sub-accordion">

													<!--begin:Menu item (User)-->
													<?php if($_SESSION['user_role'] == "Admin"): ?>
														<div class="menu-item">
															<!--begin:Menu link-->
															<a class="menu-link" href="<?php echo URLROOT; ?>/userlists">
																<span class="menu-bullet">
																	<span class="bullet bullet-dot"></span>
																</span>
																<span class="menu-title">User lists</span>
															</a>
															<!--end:Menu link-->
														</div>
													<?php endif; ?>
													<!--end:Menu item (User)-->

													<!--begin:Menu item (Student)-->
													<div class="menu-item">
														<!--begin:Menu link-->
														<a class="menu-link" href="<?php echo URLROOT; ?>/userlists/stuList">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Student lists</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item (Student)-->

													<!--begin:Menu item (Lecturer)-->
													<div class="menu-item">
														<!--begin:Menu link-->
														<a class="menu-link" href="<?php echo URLROOT; ?>/userlists/lecList">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Lecturer lists</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item (Lecturer)-->

													<!--begin:Menu item (Partner)-->
													<div class="menu-item">
														<!--begin:Menu link-->
														<a class="menu-link" href="<?php echo URLROOT; ?>/userlists/orgList">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Partner lists</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item (Partner)-->
												</div>
												<!--end:Menu sub-->

											</div>
										<?php endif; ?>
										<!--end:Menu item (User)-->
										
										<!--begin:Menu item (Badge)-->
										<?php if($_SESSION['user_role'] == "Admin"): ?>
											<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
												<!--begin:Menu item-->
												<div class="menu-item">
														<!--begin:Menu link-->
														<a class="menu-link" href="<?php echo URLROOT; ?>/badges">														
															<span class="menu-title">Badge</span>
														</a>
														<!--end:Menu link-->
													</div>
												<!--end:Menu item-->								
											</div>
										<?php endif; ?>
										<!--end:Menu item (Badge)-->

										<!--begin:Menu item (Skill)-->
										<?php if($_SESSION['user_role'] == "Admin" || $_SESSION['user_role'] == "Student"): ?>
											<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
												<!--begin:Menu item-->
												<div class="menu-item">
														<!--begin:Menu link-->
														<a class="menu-link" href="<?php echo URLROOT; ?>/skills">														
															<span class="menu-title fw-bold">List of Skill</span>
														</a>
														<!--end:Menu link-->
													</div>
												<!--end:Menu item-->								
											</div>
										<?php endif; ?>
										<!--end:Menu item (Skill)-->

										<!--begin:Menu item-->
										<div class="menu-item pt-5">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Activity</span>
											</div>
											<!--end:Menu content-->
										</div>
										<!--end:Menu item-->

										<!--begin:Menu item-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu link-->
											<span class="menu-link">
												<span class="menu-icon">
													<i class="ki-duotone ki-element-7 fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
												<span class="menu-title">Activity Options</span>
												<span class="menu-arrow"></span>
											</span>
											<!--end:Menu link-->
											<!--begin:Menu sub-->
											<div class="menu-sub menu-sub-accordion">

												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/activity">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Manage Activities</span>
													</a>
													<!--end:Menu link-->
												</div>

												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<?php if ($_SESSION['user_role'] == "Student"): ?>
													<a class="menu-link" href="<?php echo URLROOT; ?>/activity/joined">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Joined Activities</span>
													</a>
													<?php endif ?>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->

												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<?php if ($_SESSION['user_role'] !== "Student" && $_SESSION['user_role'] !== "Lecturer"): ?>
														<a class="menu-link" href="<?php echo URLROOT; ?>/activity/create">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Create Activity</span>
														</a>
													<?php endif; ?>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->

										
											</div>
											<!--end:Menu sub-->
										</div>
										<!--end:Menu item-->

										<!--begin:Menu item-->
										<?php if ($_SESSION['user_role'] !== "Partner"): ?>
										<div class="menu-item pt-5">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Personal Activity</span>
											</div>
											<!--end:Menu content-->
										</div>
										<!--end:Menu item-->

										<!--begin:Menu item-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu link-->
											<span class="menu-link">
												<span class="menu-icon">
													<i class="ki-duotone ki-element-7 fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
													
												</span>
												<span class="menu-title">Personal Activity Options</span>
												<span class="menu-arrow"></span>
											</span>
											<!--end:Menu link-->
											<!--begin:Menu sub-->
											<div class="menu-sub menu-sub-accordion">
												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Manage Personal Activities</span>
													</a>
													<!--end:Menu link-->
												</div>
												<?php if ($_SESSION ['user_role'] == "Student"): ?>
												<!--end:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
				
													<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity/create">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Create Personal Activities</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity/approved">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Approved Personal Activities</span>
													</a>
													<!--end:Menu link-->
												</div>
												<?php endif; ?>
										
												<!--end:Menu item-->
											</div>
											<!--end:Menu sub-->
										</div>
										<!--end:Menu item-->
										<?php endif; ?>	
										
										<?php if ($_SESSION['user_role'] != "Lecturer"): ?>
										<div class="menu-item pt-5">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Feedback</span>
											</div>
											<!--end:Menu content-->
										</div>
										<!--end:Menu item-->

										<!--begin:Menu item-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu link-->
											<span class="menu-link">
												<span class="menu-icon">
													<i class="ki-duotone ki-element-7 fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
													
												</span>
												<span class="menu-title">Feedback Options</span>
												<span class="menu-arrow"></span>
											</span>
											<!--end:Menu link-->
											<!--begin:Menu sub-->
											<div class="menu-sub menu-sub-accordion">
												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/feedback">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Pending Feedback</span>
													</a>
													<!--end:Menu link-->
												</div>
												<?php if ($_SESSION ['user_role'] == "Student"): ?>
													<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/feedback/approved">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Approved Feedback</span>
													</a>
													<!--end:Menu link-->
													</div>
												<?php endif; ?>
												<?php endif; ?>
												<!--end:Menu item-->
												</div>
												</div>
								
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Scroll wrapper-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
                        	
