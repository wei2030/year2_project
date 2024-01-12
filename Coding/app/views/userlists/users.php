<div class="card shadow-sm">

<div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
<h1 class="card-title ls-1" style="font-size: 24px; font-weight: bold; color: #fff;">All Users</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-bordered gy-5 table-hover">

                <thead>
                <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th style="color: #FFFFFF; font-size: 14px;">Username</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Email</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Role</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Date of Register</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['userList'] as $user): ?>
                    <tr>
                        <td style="font-size: 12px;"><?php echo $user->username; ?></td>
                        <td style="font-size: 12px;"><?php echo $user->email; ?></td>                     
                        <td style="font-size: 12px;"><?php echo $user->user_role; ?></td>                     
                        <td style="font-size: 12px;"><?php echo $user->datetime_register; ?></td>                   
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