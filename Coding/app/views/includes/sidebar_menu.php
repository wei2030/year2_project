<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
								<!--begin::Scroll wrapper-->
								<div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
									<!--begin::Menu-->
									<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">


										<!--begin:Menu item (Dashboard)-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/dashboards">														
														<span class="menu-title">Dashboard</span>
													</a>
													<!--end:Menu link-->
												</div>
											<!--end:Menu item-->								
										</div>
										<!--end:Menu item (Dashboard)-->
										


										
										<!--begin:Menu item (Badge)-->
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
										<!--end:Menu item (Badge)-->

										<!--begin:Menu item (Skill)-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/skills">														
														<span class="menu-title">Skill</span>
													</a>
													<!--end:Menu link-->
												</div>
											<!--end:Menu item-->								
										</div>
										<!--end:Menu item (Skill)-->




										<!--begin:Menu item (Post Option)-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<!--begin:Menu link-->
											<span class="menu-link">
												<span class="menu-icon">
													<i class="ki-duotone ki-element-7 fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
												<span class="menu-title">Posts Options</span>
												<span class="menu-arrow"></span>
											</span>
											<!--end:Menu link-->
											<!--begin:Menu sub-->
											<div class="menu-sub menu-sub-accordion">
												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/posts">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Manage Posts</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link" href="<?php echo URLROOT; ?>/posts/create">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Create Post</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Menu sub-->
										</div>
										<!--end:Menu item (Post Option)-->

							



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


					
									
								
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Scroll wrapper-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
                        	<!--begin::Footer-->
						<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
							<a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
								<span class="btn-label">Docs & Components</span>
								<i class="ki-duotone ki-document btn-icon fs-2 m-0">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</a>
						</div>
						<!--end::Footer-->
