<div class="card">

    <!-- List number of user -->
    <div class="row">

        <!-- Pie chart for all user -->
        <div class="col-md-5 p-10">
            <canvas id="myChart" style="width: 100%, height: auto;"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart').getContext("2d");

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Number of students', 'Number of lecturers', 'Number of partners'],
                    datasets: [{
                        data: [
                            <?php foreach($data['numStu'] as $numStu): ?>
                                <?php echo $numStu->numStu ?>,
                            <?php endforeach; ?>

                            <?php foreach($data_2['numLec'] as $numLec): ?>
                                <?php echo $numLec->numLec ?>,
                            <?php endforeach; ?>

                            <?php foreach($data_3['numPart'] as $numPart): ?>
                                <?php echo $numPart->numPart ?>,
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)', // Red
                            'rgba(255, 206, 86, 0.7)',  // Yellow
                            'rgba(54, 162, 235, 0.7)' // Blue                           
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'right',
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
        </script>
        <!-- End of pie chart -->

        <!-- List of number each user -->
        <div class="col-md-7">
            <!-- Row for number of student -->
            <div class="row">
                <a href="<?php echo URLROOT ?>/userlists/stuList">
                    <div class="min-w-125px py-3 px-4 me-6 mb-3 p-5">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/student.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of student registered: 
                            </span>

                            <?php foreach($data['numStu'] as $numStu): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numStu->numStu ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End of row student -->

            <!-- Row for number of lecturer -->
            <div class="row">
                <a href="<?php echo URLROOT ?>/userlists/lecList">
                    <div class="min-w-125px py-3 px-4 me-6 mb-3 p-5">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="lecturer" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/lecturer.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of lecturer registered: 
                            </span>

                            <?php foreach($data_2['numLec'] as $numLec): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numLec->numLec ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End of row lecturer -->

            <!-- Row for number of organizer -->
            <div class="row">
                <a href="<?php echo URLROOT ?>/userlists/orgList">
                    <div class="min-w-125px py-3 px-4 me-6 mb-3 p-5">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="partner" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/organizer.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of partners registered: 
                            </span>

                            <?php foreach($data_3['numPart'] as $numPart): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numPart->numPart ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End of row partner -->

        </div>
        <!-- End of list -->

    </div>
    <!-- End of list number of user -->

    <div class="row">
        <!-- left side -->
        <div class="col-md-5">
            <!-- Row for number of skill -->
            <a href="<?php echo URLROOT ?>/skills">
                <div class="row" style="width: 97%; margin-left: 20px;">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">

                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="skill" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/skill.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of skills created: 
                            </span>

                            <?php foreach($data_4['numSkill'] as $numSkill): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numSkill->numSkill ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!--end::Number-->

                    </div>
                </div>
            </a>
            <!-- End of row skill -->

            <!-- Row for number of badges -->
            <a href="<?php echo URLROOT ?>/badges">
                <div class="row" style="width: 97%; margin-left: 20px;">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">

                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="badge" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/badge.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of badges created: 
                            </span>

                            <?php foreach($data_5['numBadge'] as $numBadge): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numBadge->numBadge ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!--end::Number-->

                    </div>
                </div>
            </a>
            <!-- End of row badge -->

            <!-- Num of activity created -->
            <a href="<?php echo URLROOT ?>/activity">
                <div class="row" style="width: 97%; margin-left: 20px;">                        
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="created activity" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/created activity.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Created activities:  
                            </span>

                            <?php foreach($data_6['numAct'] as $numAct): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numAct->numAct ?>" style="margin-left: 97px;">
                                    <?php echo $numAct->numAct; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div> 
                </div>           
            </a>
            <!-- End of Num of activity created -->
        

            <!-- Number of students registered to all activity created -->
                <div class="row" style="width: 97%; margin-left: 20px;">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" alt="student registered" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activities.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Number of students registered: 
                            </span>

                            <?php foreach($data_7['totalStu'] as $totalStu): ?>
                                <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $totalStu->totalStu ?>" style="margin-left: 10px;">
                                    0
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <!-- End of row num of activity register -->

        </div>
        <!-- End of left side -->
                            

        <!-- right side -->
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <!-- Link to List of User -->
                    <a href="<?php echo URLROOT ?>/userlists" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="user icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/listuser.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                                List of Users
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to Manege Activity -->
                    <a href="<?php echo URLROOT ?>/activity" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px;" alt="activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/manage activity.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:35px">
                                Manage Activity
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Link to List of Badge -->
                    <a href="<?php echo URLROOT ?>/badges" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width:45px;height: 45px;" alt="badge icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/listbadge.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                                List of Badges
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to Manege Personal Activity -->
                    <a href="<?php echo URLROOT ?>/peractivity" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px;" alt="PA icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/personal activity.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-2 fw-bold" style="margin-left:35px;">
                                Manage Personal Activity
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Link to List of Skill -->
                    <a href="skills" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="skill icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/listskill.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                                List of Skills
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to Manege Feedback -->
                    <a href="<?php echo URLROOT ?>/feedback" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px; margin-top:14px" alt="feedback icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/feedback.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-2 fw-bold" style="padding-top: 8px; margin-left:35px">
                                Manage Feedback
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row-md-10">
                <div class="card border border-gray-300 border-solid rounded p-10" style="margin-top: 20px; margin-bottom: 40px;">
                    <div class="col-md-12 mb-4">
                    <h4 class="text-center ls-1 text-uppercase fs-2" style="color: #183D64; font-family: 'Arial', sans-serif; font-weight: bold;"><span class="text-uppercase fs-1" style="color:#7C1C2B">Leader</span>board</h4>
                    </div>

                    <div class="col-md-12 mb-4">
                        <div class="table-responsive">
                            <table id="kt_datatable_posts" class="table table-striped table-row-bordered gy-5 table-hover">

                                <thead>
                                <tr class="fw-bold fs-6 text-white" style="background: linear-gradient(to right, #183D64, #7C1C2B);">
                                    <th class="rounded" style="padding-left: 10px; width: 20%;">Badge</th>
                                    <th class="rounded">Name</th>
                                    <th class="rounded">Number of Joins</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($data_8['leaderboard'] as $leaderboard): ?>
                                    <tr>
                                        <?php
                                            $num_activity = $leaderboard->numActJoin;

                                            if ($num_activity >= 0 && $num_activity <= 9) {
                                                $badge_name = 'Iron';
                                            } elseif ($num_activity >= 10 && $num_activity <= 19) {
                                                $badge_name = 'Bronze';
                                            } elseif ($num_activity >= 20 && $num_activity <= 29) {
                                                $badge_name = 'Silver';
                                            } elseif ($num_activity >= 30 && $num_activity <= 39) {
                                                $badge_name = 'Gold';
                                            } elseif ($num_activity >= 40 && $num_activity <= 49) {
                                                $badge_name = 'Platinum';
                                            } elseif ($num_activity >= 50 && $num_activity <= 59) {
                                                $badge_name = 'Diamond';
                                            } else {
                                                $badge_name = 'Adventurer';
                                            }

                                            $this->db = new Database;

                                            $this->db->query("SELECT icon_dir FROM badges WHERE badge_name = :badge_name");
                                            $this->db->bind(':badge_name', $badge_name);

                                            $result = $this->db->resultSet();

                                            $row = $result[0];

                                            $icon_dir = $row->icon_dir;

                                        ?>

                                        <td style="padding-left: 10px; width: 20%;">
                                            <img class="icon w-40px h-40px" src="<?php echo URLROOT ?>/public/<?php echo $icon_dir; ?>" alt="Badge icon">
                                            <span class="badge badge-primary" style="background-color: #FCBD32;"><?php echo $badge_name; ?></span>
                                        </td>
                                        <td>
                                            &nbsp;&nbsp;<?php echo $leaderboard->st_fullname; ?></td>
                                        <td><?php echo $num_activity; ?></td>                      
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of right side -->
    </div>

</div>