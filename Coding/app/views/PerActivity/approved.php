<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
        <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Approved Personal Activity</h1>
        <div class="card-toolbar">
            
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table id="kt_datatable_posts" class="table table-bordered gy-5 table-hover">
                <thead>
                    <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                    <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Personal Activity's Name</th>
                        <th class="w-40px" style="color: #FFFFFF; font-size: 14px;">Date</th>
                        <th class="w-40px" style="color: #FFFFFF; font-size: 14px;">Venue</th>
                        <th class="w-40px" style="color: #FFFFFF; font-size: 14px;">Description</th>
                        <th class="w-40px" style="color: #FFFFFF; font-size: 14px;">Evidence</th>
                        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>
                            <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Student</th>
                        <?php elseif($_SESSION['user_role'] == "Student"): ?>
                            <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Lecturer</th>   
                        <?php endif; ?>
                        <th class="w-150px" style="color: #FFFFFF; font-size: 14px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['perActivity'] as $peractivity): ?>
                        <?php if ($peractivity->status == 'Approved'): ?>
                            <tr class="table-row" style="background: <?php echo ($index % 2 == 0) ? '#f8f9fa' : '#e9ecef'; ?>">
                            <td style="font-size: 12px;"><?php echo $peractivity->name; ?></td>
        <td style="font-size: 12px;"><?php echo date('F j', strtotime($peractivity->date)); ?></td>
        <td style="font-size: 12px;"><?php echo $peractivity->venue; ?></td>
        <td style="font-size: 12px; color: #183D64;">
        <button type="button" class="btn btn-secondary me-5" data-bs-toggle="popover" data-bs-placement="left" title="Description" data-bs-content="<?php echo $peractivity->description;?>">
        <img src="https://static.thenounproject.com/png/1815789-200.png" alt="icon" class="icon w-20px h-20px">
        </button>
        <td style="font-size: 12px;">    <?php
        if ($peractivity->evidence != null) {
            echo '<a href="' . URLROOT . '/public/' . $peractivity->evidence . '" target="_blank">View</a>';
        } else {
            echo 'No evidence';
        }
    ?>
</td>
<?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>
            <td> 
                <?php
                $studentFullName = $this->peractivityModel->getStudentFullName($peractivity->st_id);
                echo is_string($studentFullName) ? $studentFullName : '';
                ?>
            </td>
        <?php elseif ($_SESSION['user_role'] == "Student"): ?>
            <td> <?php
                $lecturerFullName = $this->peractivityModel->getLecturerFullName($peractivity->lc_id);
                echo is_string($lecturerFullName) ? $lecturerFullName : '';
                ?>
        </td>
            <?php endif; ?>
                                <td> <button class="btn btn-success" disabled>Approved</button></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({});
        });
        </script>
    </div>
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
