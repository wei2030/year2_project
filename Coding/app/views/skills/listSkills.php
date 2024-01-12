<?php $_SESSION['error'] = "" ?>

<div class="card shadow-sm">

<div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
<h1 class="card-title ls-1" style="font-size: 24px; font-weight: bold; color: #fff;">List of Skills</h1>

        <!-- Check whether logged in or not -->
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/skills/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="kt_datatable_posts" class="table table-bordered gy-5 table-hover">

                <thead>
                <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th style="color: #FFFFFF; font-size: 14px;">Skills</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Name</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Description</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['skills'] as $skill): ?>
                    <tr>
                        <!-- change to img -->
                        <td><img class="icon w-100px h-100px" src="<?php echo URLROOT ?>/public/<?php echo $skill->skill_dir; ?>" alt="Skill icon"></td> 
                        <td style="font-size: 12px;"><?php echo $skill->skill_name; ?></td>
                        <td style="font-size: 12px;"><?php echo $skill->skill_desc; ?></td>                      
                        <td>
                            <a href="<?php echo URLROOT . "/skills/update/" . $skill->skill_id ?>"
                                class="btn btn-light-warning">Update</a>

                            <a href="<?php echo URLROOT . "/skills/assign/" . $skill->skill_id ?>"
                                class="btn btn-light-info">Assign TO</a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt<?php echo $skill->skill_id?>">
                                Delete
                            </button>

                            <div class="modal fade" tabindex="-1" id="kt<?php echo $skill->skill_id?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Delete Skill !</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->

                                        </div>

                                        <div class="modal-body">
                                            Are you sure want to delete this skill?
                                        </div>

                                        <div class="modal-footer">
                                            <form action="<?php echo URLROOT . "/skills/delete/" . $skill->skill_id; ?>" method="POST">
                                                <input type="hidden" id="expenses" name="expenses" value="expenses">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Close</button>
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