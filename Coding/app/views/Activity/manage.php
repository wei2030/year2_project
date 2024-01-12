<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Manage Activity</h1>
        <div class="card-toolbar">
            <?php if (isLoggedIn() && $_SESSION['user_role'] !== "Lecturer" && $_SESSION['user_role'] !== "Student"): ?>
                <a href="<?php echo URLROOT;?>/activity/create" class="btn btn-light-primary btn-sm">Create</a>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="mb-3" style="margin-top: -20px;margin-left:20%">
        <label for="categoryFilter" class="form-label" style="color: #183D64; font-size: 14px;">Filter by Category:</label>
        <div class="input-group w-75">
            <select id="categoryFilter" class="form-select">
                <option value="">All Categories</option>
                <option value="Competition / Scholarship">Competition / Scholarship</option>
                <option value="Program / Activities">Program / Activities</option>
                <option value="Bootcamp / Workshop">Bootcamp / Workshop</option>
                <option value="Part Time">Part Time</option>
                <option value="Volunteering">Volunteering</option>
                <option value="Internship">Internship</option>
            </select>
        </div>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-hover table-bordered">
                <thead>
                    <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">No.</th>
                        <th class="w-100px" style="color: #FFFFFF; font-size: 14px;">Category</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Activity's Name</th>
                        <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Registration Date</th>
                        <th class="w-110px" style="color: #FFFFFF; font-size: 14px;">Activity Date</th>
                        <th class="w-100px" style="color: #FFFFFF; font-size: 14px;">Venue</th>
                        <th class="w-70px" style="color: #FFFFFF; font-size: 14px;">Description</th>
                        <th class="w-135px"style="color: #FFFFFF; font-size: 14px;">Participant</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['activity'] as $index => $activities): ?>
    <tr class="table-row" style="background: <?php echo ($index % 2 == 0) ? '#f8f9fa' : '#e9ecef'; ?>; <?php echo ($activities->action === 'ended') ? 'background-color: #c7943d !important; color: white !important;' : ''; echo ($activities->action === 'joined' || $activities->action === 'join') ? 'background-color: #ffcb5a !important;' : ''; ?>">
        <td style="font-size: 12px;"><?php echo $activities->ac_id; ?></td>
        <td style="font-size: 12px; color: #183D64;"><?php echo $activities->category; ?></td>
        <td style="font-size: 12px; color: #183D64;"><?php echo $activities->name; ?></td>
        <td style="font-size: 12px;"><?php echo date('d/m/y', strtotime($activities->date_reg_start)) . ' - ' . date('d/m/y', strtotime($activities->date_reg_end)); ?></td>
        <td style="font-size: 12px;"><?php echo date('d/m/y', strtotime($activities->activitystart)) . ' - ' . date('d/m/y', strtotime($activities->activityend)); ?></td>
        <td style="font-size: 12px; color: #183D64;"><?php echo $activities->venue; ?></td>
        <td style="font-size: 12px; color: #183D64;">
        <button type="button" class="btn btn-secondary me-5" data-bs-toggle="popover" data-bs-placement="left" title="Description" data-bs-content="<?php echo $activities->desc;?>">
        <img src="https://static.thenounproject.com/png/1815789-200.png" alt="icon" class="icon w-20px h-20px">
        </button>
        </td>
        <td style="font-size: 12px;"><?php echo $this->activityModel->getParticipantNumber($activities->ac_id); ?> / <?php echo $activities->max_participants; ?></td>
                    
            
           
            <td>
            <?php if ($_SESSION['user_role'] == "Admin"): ?>
            <!-- Existing code for Lecturer buttons -->
            <a href="<?php echo URLROOT . "/activity/update/" . $activities->ac_id ?>" class="btn btn-light-warning">Update</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $activities->ac_id?>">
                Delete
            </button>
        <?php elseif ($_SESSION['user_role'] == "Partner"): ?>
            <!-- Existing code for Lecturer buttons -->
            <a href="<?php echo URLROOT . "/activity/update/" . $activities->ac_id ?>" class="btn btn-light-warning">Update</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $activities->ac_id?>">
                Delete
            </button>
    <?php elseif ($_SESSION['user_role'] == "Student"): ?>
        <?php if ($this->activityModel->isRegistrationEnded($activities->ac_id, $activities->date_reg_end)): ?>
            <button class="btn btn-secondary" disabled>Ended</button>
        <?php elseif ($this->activityModel->isStudentJoined($_SESSION['user_id'], $activities->ac_id)): ?>
            <button class="btn btn-success" disabled>Joined</button>
            <!-- Add additional button or modify existing button for joined student -->
            <!--- <a href="<?php//echo URLROOT . "/activity/leave/" . $activities->ac_id ?>" class="btn btn-danger">Leave</a> -->
        <?php elseif ($this->activityModel->isRegistrationStarted($activities->ac_id, $activities->date_reg_start)): ?>
            <button class="btn btn-secondary" disabled>Not Started</button>
        <?php elseif ($this->activityModel->isActivityFull($activities->ac_id)): ?>
            <button class="btn btn-secondary" disabled>Full</button>
        <?php else: ?>
            <a href="<?php echo URLROOT . "/activity/join/" . $activities->ac_id ?>" class="btn btn-light-warning" data-bs-toggle="modal" data-bs-target="#joinModal<?php echo $activities->ac_id; ?>">Join</a>
        <?php endif; ?>
    <?php endif; ?>
            
                <?php if ($_SESSION['user_role'] !== "Student"): ?>
                <div class="modal fade" tabindex="-1" id="kt<?php echo $activities->ac_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Delete</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                Are you sure want to delete this activity?
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/activity/delete/" . $activities->ac_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($_SESSION['user_role'] == "Student"): ?>
                           <!-- Add the modal for Join action -->
                           <div class="modal fade" tabindex="-1" id="joinModal<?php echo $activities->ac_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Join Activity</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <p><strong>Activity Name:</strong> <?php echo $activities->name; ?></p>
                <p><strong>Category:</strong> <?php echo $activities->category; ?></p>
                <p><strong>Registration Date:</strong> <?php echo date('d/m/y ', strtotime($activities->date_reg_start)); ?> - <?php echo date('d/m/y ', strtotime($activities->date_reg_end)); ?>
                <p><strong>Activity Date:</strong> <?php echo date('d/m/y', strtotime($activities->activitystart)); ?></p>
                <p><strong>Venue:</strong> <?php echo $activities->venue; ?></p>
                <p><strong>Description:</strong> <?php echo $activities->desc; ?></p>
                <p><strong>Participants:</strong> <?php echo $this->activityModel->getParticipantNumber($activities->ac_id); ?> / <?php echo $activities->max_participants; ?></p>
                <hr>
                <p>Are you sure to join this activity?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Cancel</button>
                <a href="<?php echo URLROOT . "/activity/join/" . $activities->ac_id ?>" class="btn btn-primary font-weight-bold">Join</a>
            </div>
        </div>
    </div>
</div>
                <?php endif ?>
                
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({
                "pageLength": 10, // set the initial page length as desired
            });

            // Add event listener for category filter change
            $('#categoryFilter').on('change', function () {
                var selectedCategory = $(this).val();
                table.columns(1).search(selectedCategory).draw(); // assuming category is in the second column
            });
        });
        </script>

    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>

    </div>
</div>