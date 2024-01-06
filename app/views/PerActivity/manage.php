<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Personal Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/peractivity/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Personal Activity's Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Description</th>
                        <th>Evidence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['peractivity'] as $peractivities): ?>
                    <tr>
                        <td><?php echo $peractivities->name; ?></td>
                        <td><?php echo date('F j h:m', strtotime($peractivities->date)); ?></td>
                        <td><?php echo $peractivities->venue; ?></td>
                        <td><?php echo $peractivities->description; ?></td>
                        <td><?php echo $peractivities->evidence; ?></td>
                        
                        <td>
                            <?php if(isset($_SESSION['id']) && $_SESSION['user_id'] == $peractivities->id): ?>

                            <a href="<?php echo URLROOT . "/peractivity/update/" . $peractivities->pac_id ?>"
                                class="btn btn-light-warning">Update</a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt<?php echo $peractivities->pac_id?>">
                                Delete
                            </button>

                            <div class="modal fade" tabindex="-1" id="kt<?php echo $peractivities->pac_id?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Delete</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            Are you sure want to delete this activity?
                                        </div>

                                        <div class="modal-footer">
                                            <form action="<?php echo URLROOT . "/peractivity/delete/" . $peractivities->pac_id; ?>"
                                                method="POST">
                                                <input type="hidden" id="expenses" name="expenses" value="expenses">
                                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary font-weight-bold">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
