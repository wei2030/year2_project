<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Overview Dashboard</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/posts/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        
        <div class="container">

            <div class="row">
                <div class="col">
                    1 of 4
                </div>
                <div class="col">
                    2 of 4
                </div>
                <div class="col">
                    3 of 4
                </div>
                <div class="col">
                    4 of 4
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>