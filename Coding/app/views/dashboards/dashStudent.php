<div class="card">

    <div class="row">

        <div class="col-md-8">

            <!-- top -->
            <div class="row">
                <!-- Num of activity registered -->
                <div class="col-md-4">
                    <a href="<?php echo URLROOT ?>/activity">           
                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3 d-flex flex-column align-items-center">
                            <div class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-100px h-100px" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>
                            </div>

                            <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-top: 10px;">
                                Number of activities: 
                                <?php foreach($data['numAct'] as $numAct): ?>
                                    <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numAct->numAct ?>" style="margin-left: 10px;">
                                        <?php echo $numAct->numAct; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>            
                    </a>
                </div>
                <!-- End of Num of activity registered -->


                <!-- Num of skill assigned -->
                <div class="col-md-4">
                    <a href="<?php echo URLROOT ?>/skills">            
                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3 d-flex flex-column align-items-center">
                            <div class="fs-3 text-success me-2">
                                <img class="mw-100 mh-300px card-rounded-bottom w-100px h-100px" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/skill.png"/>
                            </div>

                            <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-top: 10px;">
                                Number of skills: 
                                <?php foreach($data_2['numSkill'] as $numSkill): ?>
                                    <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numSkill->numSkill ?>" style="margin-left: 10px;">
                                        0
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End of Num of skill assigned -->
            
            

                <!-- Badge assigned -->
                <div class="col-md-4">
                    <a href="<?php echo URLROOT ?>/badges">
                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3 d-flex flex-column align-items-center">

                            <?php foreach ($data_3['studentBadge'] as $studentBadge) :?>
                                <img class="icon w-100px h-100px" src="<?php echo URLROOT ?>/public/<?php echo $studentBadge->icon_dir; ?>" alt="badge icon">
                            <?php endforeach; ?>

                            <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-top: 10px;">
                                Badge
                            </div>

                        </div>
                    </a>
                </div>
                <!-- End of Badge assigned -->
            </div>
            <!-- End of top -->

            <!-- bottom (leaderboard) -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="kt_datatable_posts" class="table table-row-bordered gy-5">

                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>Name</th>
                                <th>Number of join</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data_4['leaderboard'] as $leaderboard): ?>
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
            <!-- End of bottom -->

        </div>
        
        <!-- right side (function) -->
        <div class="col-md-4">
            <div class="row">
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

            <div class="row">
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

            <div class="row">
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

            <div class="row">
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

            <div class="row">
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

            <div class="row">
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
        <!-- End of right side -->

    </div>
</div>