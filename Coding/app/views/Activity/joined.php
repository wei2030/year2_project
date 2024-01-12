<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Activity Joined</h3>
        <div class="card-toolbar">
        </div>
    </div>

    <div class="mb-3">
        <label for="categoryFilter" class="form-label">Filter by Category:</label>
        <select id="categoryFilter" class="form-select">
            <option value="">All Categories</option>
            <option value="Competition / Scholarship">Competition / Scholarship</option>
            <option value="Program / Activities">Program / Activities</option>
            <option value="Bootcamp / Workshop">Bootcamp / Workshop</option>
            <option value="Part Time">Part Time</option>
            <option value="Volunteering">Volunteering</option>
            <option value="Internship">Internship</option>
        </select>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>No.</th>
                        <th>Category</th>
                        <th>Activity's Name</th>
                        <th>Activity Date</th>
                        <th>Venue</th>
                        <th>Description</th>
                        <th>Participants</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach ($data['joinedActivities'] as $activities): ?>
                    
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $activities->category; ?></td>
                            <td><?php echo $activities->name; ?></td>
                            <td><?php echo date('d/m/y ', strtotime($activities->activitystart)); ?> - <?php echo date('d/m/y ', strtotime($activities->activityend)); ?></td>
                            <td><?php echo $activities->venue; ?></td>
                            <td><?php echo $activities->desc; ?></td>
                            <td><?php echo $this->activityModel->getParticipantNumber($activities->ac_id); ?> / <?php echo $activities->max_participants; ?></td>
                            <td> <button class="btn btn-success" disabled>Joined</button>
                            <?php if ($this->activityModel->isActivityEnd($activities->ac_id, $activities->activityend)): ?>
    <?php if (!$this->activityModel->hasFeedback($activities->ac_id, $_SESSION['user_id'])): ?>
        <a href="<?php echo URLROOT . "/activity/form/" . $activities->ac_id ?>" class="btn btn-light-warning">Feedback</a>
    <?php else: ?>
        <button class="btn btn-secondary" disabled>Filled</button>
    <?php endif; ?>
<?php endif; ?>
    </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                var table = $('#kt_datatable_posts').DataTable({
                    "pageLength": 10, // set the initial page length as desired
                });

                // Add event listener for category filter change
                $('#categoryFilter').on('change', function () {
                    var selectedCategory = $(this).val();
                    table.columns(1).search(selectedCategory).draw(); // assuming category is in the second column
                });
            });
        </script>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
