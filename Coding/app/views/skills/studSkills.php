<div class="card shadow-sm">

<div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
<h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">List of Skills</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-hover table-bordered">

                <thead>
                <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th style="color: #FFFFFF; font-size: 14px;">Skills</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Name</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Description</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['studentSkills'] as $skill): ?>
                    <tr>

                        <!-- change to img -->
                        <td><img class="icon w-100px h-100px" src="<?php echo URLROOT ?>/public/<?php echo $skill->skill_dir; ?>" alt="Skill icon"></td> 
                        <td class="ls-1 text-uppercase" style="font-style:italic"><?php echo $skill->skill_name; ?></td>
                        <td class="ls-1"><?php echo $skill->skill_desc; ?></td>                      
                        
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