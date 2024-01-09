<div class="card">

    <!-- List number of user -->
    <div class="row">

        <!-- Pie chart for all user -->
        <div class="col-md-4">
            <img class="mx-auto card-rounded-bottom" alt="" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/pie.png"/>
        </div>
        <!-- End of pie chart -->

        <!-- List of number each user -->
        <div class="col-md-8">
            <!-- Row for number of student -->
            <div class="row">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="fs-3 text-success me-2">
                            <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/student.png"/>
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
                    <!--end::Number-->
                </div>
            </div>
            <!-- End of row student -->

            <!-- Row for number of lecturer -->
            <div class="row">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="fs-3 text-success me-2">
                            <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/lecturer.png"/>
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
                    <!--end::Number-->

                </div>
            </div>
            <!-- End of row lecturer -->

            <!-- Row for number of organizer -->
            <div class="row">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="fs-3 text-success me-2">
                            <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/organizer.png"/>
                        </span>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                            Number of partner/organizer registered: 
                        </span>

                        <?php foreach($data_3['numPart'] as $numPart): ?>
                            <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numPart->numPart ?>" style="margin-left: 10px;">
                                0
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!--end::Number-->

                </div>
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
                <div class="row">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">

                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/skill.png"/>
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
                <div class="row">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">

                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/badge.png"/>
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
            <div class="row">
                <a href="<?php echo URLROOT ?>/activity">           
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>
                            </span>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                Created activities:  
                            </span>

                            <?php foreach($data_6['numAct'] as $numAct): ?>
                                <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numAct->numAct ?>" style="margin-left: 10px;">
                                    <?php echo $numAct->numAct; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>            
                </a>
            </div>
            <!-- End of Num of activity created -->
        

            <!-- Number of students registered to all activity created -->
            <div class="row">
                <a href="<?php echo URLROOT ?>/activity">
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>
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
                </a>
            </div>
            <!-- End of row num of activity register -->

        </div>
        <!-- End of left side -->


        <!-- right side -->
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <!-- Link to Manage Activity -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Activity
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to List of Reward -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="reward icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/reward.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List of Rewards
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Link to Manage Activity -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Activity
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to List of Reward -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="reward icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/reward.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List of Rewards
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Link to Manage Activity -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Activity
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <!-- Link to List of Reward -->
                    <a href="#" class="card hover-elevate-up shadow-sm parent-hover">
                        <div class="card-body d-flex align-items">
                            <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="reward icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/reward.png"/>

                            <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List of Rewards
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">
                    <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>Name</th>
                                <th>Number of join</th>
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

                                <td><img class="icon w-25px h-25px" src="<?php echo URLROOT ?>/public/<?php echo $icon_dir; ?>" alt="Badge icon">
                                    &nbsp;&nbsp;<?php echo $leaderboard->st_fullname; ?></td>
                                <td><?php echo $num_activity; ?></td>                      
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- End of right side -->
    </div>

</div>