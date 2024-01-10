<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">User</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Register</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['userList'] as $user): ?>
                    <tr>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->email; ?></td>                     
                        <td><?php echo $user->user_role; ?></td>                     
                        <td><?php echo $user->datetime_register; ?></td>                   
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