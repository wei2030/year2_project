<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">List of Skills</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Skills</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['studentSkills'] as $skill): ?>
                    <tr>

                        <!-- change to img -->
                        <td><img class="icon w-100px h-100px" src="<?php echo URLROOT ?>/public/<?php echo $skill->skill_dir; ?>" alt="Skill icon"></td> 
                        <td><?php echo $skill->skill_name; ?></td>
                        <td><?php echo $skill->skill_desc; ?></td>                      
                        
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