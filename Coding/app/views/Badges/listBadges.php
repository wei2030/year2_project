<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">List of Rewards</h3>

        <!-- Check whether logged in or not -->
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/badges/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Badges</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['badges'] as $badge): ?>
                    <tr>
                        <td><?php echo $badge->icon_dir; ?></td>
                        <td><?php echo $badge->badge_name; ?></td>
                        <td><?php echo $badge->badge_desc; ?></td>                      
                        <td>
                            <a href="<?php echo URLROOT . "/badges/update/" . $badge->badge_id ?>"
                                class="btn btn-light-warning">Update</a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt<?php echo $badge->badge_id?>">
                                Delete
                            </button>

                            <div class="modal fade" tabindex="-1" id="kt<?php echo $badge->badge_id?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Delete Badge !</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->

                                        </div>

                                        <div class="modal-body">
                                            Are you sure want to delete this badge?
                                        </div>

                                        <div class="modal-footer">
                                            <form action="<?php echo URLROOT . "/badges/delete/" . $badge->badge_id; ?>" method="POST">
                                                <input type="hidden" id="expenses" name="expenses" value="expenses">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                var table = $('#kt_datatable_posts').DataTable({

                });
            });
        </script>

    </div>
</div>