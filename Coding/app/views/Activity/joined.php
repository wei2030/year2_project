<div class="card shadow-sm">
    <div class="card-header" style="background: linear-gradient(to right, #183D64, #7C1C2B); color: #FCBD32;">
    <h1 class="card-title" style="font-size: 24px; font-weight: bold; color: #fff;">Activity Joined</h1>
        <div class="card-toolbar">
        </div>
    </div>

    <div class="mb-3" style="margin-top: -20px;margin-left:20%">
        <label for="categoryFilter" class="form-label">Filter by Category:</label>
        <div class="input-group w-75">
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
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="kt_datatable_posts" class="table table-bordered gy-5 table-hover">
                <thead>
                <tr class="fw-bold text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                        <th class="w-45px" style="color: #FFFFFF; font-size: 14px;">No.</th>
                        <th class="w-100px" style="color: #FFFFFF; font-size: 14px;">Category</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Activity's Name</th>
                        <th class="w-110px" style="color: #FFFFFF; font-size: 14px;">Activity Date</th>
                        <th class="w-100px" style="color: #FFFFFF; font-size: 14px;">Venue</th>
                        <th class="w-70px" style="color: #FFFFFF; font-size: 14px;">Description</th>
                        <th class="w-135px"style="color: #FFFFFF; font-size: 14px;">Participant</th>
                        <th style="color: #FFFFFF; font-size: 14px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach ($data['joinedActivities'] as $activities): ?>
                    
                        <tr class="table-row" style="background: <?php echo ($index % 2 == 0) ? '#f8f9fa' : '#e9ecef'; ?>; <?php echo ($activities->action === 'ended') ? 'background-color: #c7943d !important; color: white !important;' : ''; echo ($activities->action === 'joined' || $activities->action === 'join') ? 'background-color: #ffcb5a !important;' : ''; ?>">
                            <td style="font-size: 12px;"><?php echo $index++; ?></td>
                            <td style="font-size: 12px;"><?php echo $activities->category; ?></td>
                            <td style="font-size: 12px;"><?php echo $activities->name; ?></td>
                            <td style="font-size: 12px;"><?php echo date('d/m/y ', strtotime($activities->activitystart)); ?> - <?php echo date('d/m/y ', strtotime($activities->activityend)); ?></td>
                            <td style="font-size: 12px;"><?php echo $activities->venue; ?></td>
                            <td><button type="button" class="btn btn-secondary me-5" data-bs-toggle="popover" data-bs-placement="left" title="Description" data-bs-content="<?php echo $activities->desc;?>">
                            <img src="https://static.thenounproject.com/png/1815789-200.png" alt="icon" class="icon w-20px h-20px">
                            </button>
                            </td>
                            <td style="font-size: 12px;"><?php echo $this->activityModel->getParticipantNumber($activities->ac_id); ?> / <?php echo $activities->max_participants; ?></td>
                            <td style="font-size: 12px;"> <button class="btn btn-success" disabled>Joined</button>
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
    <div class="card-footer" style="background-image: linear-gradient(white,#FCBD32); color: #FCBD32; text-align: center; padding: 20px;">
    <h4 class="mb-0 text-uppercase fw-bold text-gray-600 fs-6 ls-1">From lead generation, community building to program development, let us help you reach out to youths!</h4>
</div>
</div>
