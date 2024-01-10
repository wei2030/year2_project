<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">List of Student</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Race</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data_2['stuList'] as $stu): ?>
                    <tr>
                        <td><?php echo $stu->st_fullname; ?></td>
                        <td><?php echo $stu->st_email; ?></td>                     
                        <td><?php echo $stu->st_phone; ?></td>                     
                        <td><?php echo $stu->st_gender; ?></td>                     
                        <td><?php echo $stu->st_race; ?></td>                     
                        <td><?php echo $stu->st_address; ?></td>                     
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