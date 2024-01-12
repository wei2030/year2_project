<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Approved Personal Activity</h3>
        <div class="card-toolbar">
            
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                    <th>Personal Activity's Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Description</th>
                        <th>Evidence</th>
                        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Admin"): ?>
                            <th>Student</th>
                        <?php elseif($_SESSION['user_role'] == "Student"): ?>
                            <th>Lecturer</th>   
                        <?php endif; ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['perActivity'] as $peractivity): ?>
                        <?php if ($peractivity->status == 'Approved'): ?>
                            <tr>
                            <td><?php echo $peractivity->name; ?></td>
        <td><?php echo date('F j', strtotime($peractivity->date)); ?></td>
        <td><?php echo $peractivity->venue; ?></td>
        <td><?php echo $peractivity->description; ?></td>
        <td>    <?php
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
    <div class="card-footer">
        Footer
    </div>
</div>
