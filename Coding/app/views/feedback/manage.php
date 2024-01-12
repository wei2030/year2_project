<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Feedback</h3>
        <div class="card-toolbar"></div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>No.</th>
                        <th>Category</th>
                        <th>Activity's Name</th>
                        <th>Registration Date</th>
                        <th>Activity Date</th>
                        <th>Venue</th>
                        <th>Description</th>
                        <th>Participants</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1 ?>
                    <?php foreach($data['feedback'] as $activities): ?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $activities->category; ?></td>
                            <td><?php echo $activities->name; ?></td>
                            <td><?php echo date('d/m/y ', strtotime($activities->date_reg_start)); ?> - <?php echo date('d/m/y ', strtotime($activities->date_reg_end)); ?></td>
                            <td><?php echo date('d/m/y ', strtotime($activities->activitystart)); ?> - <?php echo date('d/m/y ', strtotime($activities->activityend)); ?></td>
                            <td><?php echo $activities->venue; ?></td>
                            <td><?php echo $activities->desc; ?></td>
                            <td><?php echo $this->activityModel->getParticipantNumber($activities->ac_id); ?> / <?php echo $activities->max_participants; ?></td>
                                                   
                            <td>
                                <?php if ($_SESSION['user_role'] == "Student"): ?>
                                        <a href="<?php echo URLROOT; ?>/feedback/update/<?php echo $activities->feedback_id; ?>" class="btn btn-light-warning">Update</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php echo $activities->feedback_id?>">
                                        Delete
                                    </button>
                            <?php elseif ($_SESSION['user_role'] == "Partner" || $_SESSION['user_role'] == "Admin"): ?>
                                <!-- <a href="<?php// echo URLROOT . "/feedback/approve/" . $activities->feedback_id ?>"
                    class="btn btn-light-warning">Approve</a> -->
                                    <button type="button" class="btn btn-light-warning" data-bs-toggle="modal" data-bs-target="#kt_approve<?php echo $activities->feedback_id?>">
                                        Approve</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_reject<?php echo $activities->feedback_id?>">
                                        Reject
                                    </button>
                            <?php endif; ?>

                            <?php  if ($_SESSION['user_role'] == "Student"): ?>
                                <div class="modal fade" tabindex="-1" id="kt<?php echo $activities->feedback_id?>">
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
                            <p><strong>Full Name:</strong></p>
<p><?php echo $activities->st_fullname; ?></p>

<p><strong>1. What is your role in this activity?</strong></p>
<p><?php echo $activities->q1; ?></p>

<p><strong>2. What knowledge/skills have you gained about the topics presented in this activity?</strong></p>
<p><?php echo $activities->q2; ?></p>

<p><strong>3. How will you apply what you have learned to your field of study?</strong></p>
<p><?php echo $activities->q3; ?></p>

<p><strong>Content was well organized:</strong></p>
<p><?php echo $activities->content_q1; ?></p>

<p><strong>Content was based on credible and up-to-date information:</strong></p>
<p><?php echo $activities->content_q2; ?></p>

<p><strong>Content was easy to understand:</strong></p>
<p><?php echo $activities->content_q3; ?></p>

<p><strong>Presenters were well organized:</strong></p>
<p><?php echo $activities->presenter_q1; ?></p>

<p><strong>Presenters were based on credible and up-to-date information:</strong></p>
<p><?php echo $activities->presenter_q2; ?></p>

<p><strong>Presenters were easy to understand:</strong></p>
<p><?php echo $activities->presenter_q3; ?></p>

<p><strong>Project File:</strong></p>
<?php if ($activities->projectFile != null) {
            echo '<a href="' . URLROOT . '/public/' . $activities->projectFile . '" target="_blank">View</a>';
        } else {
            echo 'No evidence';
        } ?>

<hr>

<p>Are you sure you want to delete this feedback?</p>

                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/feedback/delete/".  $activities->feedback_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($_SESSION['user_role'] == "Partner" || $_SESSION['user_role'] == "Admin"): ?>
                    <div class="modal fade" tabindex="-1" id="kt_approve<?php echo $activities->feedback_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Approve</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                            <p><strong>Full Name:</strong></p>
<p><?php echo $activities->st_fullname; ?></p>

<p><strong>1. What is your role in this activity?</strong></p>
<p><?php echo $activities->q1; ?></p>

<p><strong>2. What knowledge/skills have you gained about the topics presented in this activity?</strong></p>
<p><?php echo $activities->q2; ?></p>

<p><strong>3. How will you apply what you have learned to your field of study?</strong></p>
<p><?php echo $activities->q3; ?></p>

<p><strong>Content was well organized:</strong></p>
<p><?php echo $activities->content_q1; ?></p>

<p><strong>Content was based on credible and up-to-date information:</strong></p>
<p><?php echo $activities->content_q2; ?></p>

<p><strong>Content was easy to understand:</strong></p>
<p><?php echo $activities->content_q3; ?></p>

<p><strong>Presenters were well organized:</strong></p>
<p><?php echo $activities->presenter_q1; ?></p>

<p><strong>Presenters were based on credible and up-to-date information:</strong></p>
<p><?php echo $activities->presenter_q2; ?></p>

<p><strong>Presenters were easy to understand:</strong></p>
<p><?php echo $activities->presenter_q3; ?></p>

<p><strong>Project File:</strong></p>
<?php if ($activities->projectFile != null) {
            echo '<a href="' . URLROOT . '/public/' . $activities->projectFile . '" target="_blank">View</a>';
        } else {
            echo 'No evidence';
        } ?>

<hr>

<p>Are you sure you want to approve this feedback?</p>
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/feedback/approve/" . $activities->feedback_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    <button type="submit" class="btn btn-primary font-weight-bold">Approve</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" id="kt_reject<?php echo $activities->feedback_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Reject</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                Are you sure want to reject this activity?
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/feedback/delete/" . $activities->feedback_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    <button type="submit" class="btn btn-primary font-weight-bold">Reject</button>
                                </form>
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
        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_posts').DataTable({});
            });
        </script>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
