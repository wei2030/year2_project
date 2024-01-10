<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">List of Lecturer</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data_4['orgList'] as $org): ?>
                    <tr>
                        <td><?php echo $org->pn_name; ?></td>
                        <td><?php echo $org->pn_email; ?></td>                     
                        <td><?php echo $org->pn_phone; ?></td>                  
                        <td><?php echo $org->pn_address; ?></td>                     
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