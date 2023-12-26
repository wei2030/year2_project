<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Dashboard</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/posts/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        
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