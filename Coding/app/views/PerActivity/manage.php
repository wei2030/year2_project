<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Manage Personal Activity</h1>
        <div class="card-toolbar">
            <?php if(isLoggedIn() && $_SESSION['user_role'] == "Student"): ?>
                <a href="<?php echo URLROOT;?>/peractivity/create" class="btn btn-light-primary btn-sm">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table id="kt_datatable_posts" class="table table-bordered gy-5 table-hover">
                <thead>
                <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Personal Activity's Name</th>
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Date</th>
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Venue</th>
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Description</th>
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Evidence</th>
                        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>
                            <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Student</th>
                        <?php elseif($_SESSION['user_role'] == "Student"): ?>
                            <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Lecturer</th>   
                        <?php endif; ?>
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['perActivity'] as $index => $peractivities): ?>
    <tr class="table-row" style="background: <?php echo ($index % 2 == 0) ? '#f8f9fa' : '#e9ecef'; ?>">
        <td style="font-size: 12px;"><?php echo $peractivities->name; ?></td>
        <td style="font-size: 12px; color: #183D64;"><?php echo date('F j', strtotime($peractivities->date)); ?></td>
        <td style="font-size: 12px; color: #183D64;"><?php echo $peractivities->venue; ?></td>
        <td style="font-size: 12px; color: #183D64;">
        <button type="button" class="btn btn-secondary me-5" data-bs-toggle="popover" data-bs-placement="left" title="Description" data-bs-content="<?php echo $peractivities->description;?>">
        <img src="https://static.thenounproject.com/png/1815789-200.png" alt="icon" class="icon w-20px h-20px">
        </button>
        <td style="font-size: 12px; color: #183D64;">
            <?php
            if ($peractivities->evidence != null) {
                echo '<a href="' . URLROOT . '/public/' . $peractivities->evidence . '" target="_blank">View</a>';
            } else {
                echo 'No evidence';
            }
            ?>
        </td>
        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>
            <td> 
                <?php
                $studentFullName = $this->peractivityModel->getStudentFullName($peractivities->st_id);
                echo is_string($studentFullName) ? $studentFullName : '';
                ?>
            </td>
        <?php elseif ($_SESSION['user_role'] == "Student"): ?>
            <td> <?php
                $lecturerFullName = $this->peractivityModel->getLecturerFullName($peractivities->lc_id);
                echo is_string($lecturerFullName) ? $lecturerFullName : '';
                ?></td>
            <?php endif ?>
        <td>
            <?php if ($_SESSION['user_role'] == "Student"): ?>
                <!-- Student actions -->
                <div class="btn-group" style="margin-right: 10px;">
    <a href="<?php echo URLROOT . "/peractivity/update/" . $peractivities->pac_id ?>" class="btn btn-sm btn-light-warning">Update</a>
    <a href="<?php echo URLROOT . "/peractivity/assign/" . $peractivities->pac_id ?>" class="btn btn-sm btn-light-primary">Assign To</a>
    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#kt<?php echo $peractivities->pac_id ?>">Delete</button>

    </div>

<?php elseif ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>

<div class="btn-group" style="margin-right: 10px;">
    <a href="<?php echo URLROOT . "/peractivity/approve/" . $peractivities->pac_id ?>" class="btn btn-sm btn-light-warning">Approve</a>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $peractivities->pac_id ?>">Reject</button>
</div>


<?php elseif ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>

<div class="btn-group" style="margin-right: 10px;">
    <a href="<?php echo URLROOT . "/peractivity/approve/" . $peractivities->pac_id ?>" class="btn btn-sm btn-light-warning">Approve</a>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $peractivities->pac_id ?>">Reject</button>
</div>


<?php elseif ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>

<div class="btn-group">
    <a href="<?php echo URLROOT . "/peractivity/approve/" . $peractivities->pac_id ?>" class="btn btn-sm btn-light-warning">Approve</a>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $peractivities->pac_id ?>">Reject</button>
</div>

                <!-- Add additional code for assigning to lecturers if needed -->
            <?php endif; ?>
            <!-- Delete modal -->
           
                <!-- ... modal content ... -->
                <?php if ($_SESSION['user_role'] !== "Student"): ?>
                <div class="modal fade" tabindex="-1" id="kt<?php echo $peractivities->pac_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title text-danger">WARNING!</h1>


                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
    <p class="font-weight-bold">
        <h3>⚠️ This action is irreversible.</h3>
        
        <h3 style="color: #FF6347;">Are you absolutely sure you want to reject this activity?</h3>
    </p>
</div>





                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/peractivity/delete/" . $peractivities->pac_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    
                                    <button type="submit" class="btn btn-primary font-weight-bold">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($_SESSION['user_role'] == "Student"): ?>
                <div class="modal fade" tabindex="-1" id="kt<?php echo $peractivities->pac_id?>">
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
                                Are you sure want to delete this personal activity?
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/peractivity/delete/" . $peractivities->pac_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    
                                    <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </td>
    </tr>
<?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_posts').DataTable({});
            });
        </script>
    </div>
    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
