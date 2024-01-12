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
                                <img class="mw-100 mh-300px card-rounded-bottom w-100px h-100px" alt="activities" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activities.png"/>
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
                                <img class="mw-100 mh-300px card-rounded-bottom w-100px h-100px" alt="skill" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/skill.png"/>
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
                    <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3 d-flex flex-column align-items-center">

                        <?php if(isset($data_3['studentBadge'])): ?>
                            <?php foreach ($data_3['studentBadge'] as $studentBadge) :?>
                                <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="<?php echo $studentBadge->badge_name; ?>">
                                    <div class="symbol symbol-100px">
                                        <img class="icon" src="<?php echo URLROOT ?>/public/<?php echo $studentBadge->icon_dir; ?>" alt="badge icon">
                                    </div>
                                </button>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <button type="button" class="btn btn-secondary my-2 me-5" data-bs-dismiss="true" data-bs-toggle="popover" data-bs-placement="top" title="iron">
                                <div class="symbol symbol-100px">
                                    <img class="icon" src="<?php echo URLROOT ?>/public/assets/media/badges/iron.png" alt="badge icon">
                                </div>
                            </button>
                        <?php endif; ?>

                        <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-top: 10px;">
                            Badge
                        </div>

                    </div>
                </div>
                <!-- End of Badge assigned -->
            </div>
            <!-- End of top -->

            <!-- bottom (leaderboard) -->
            <div class="row-md-12">
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
            <!-- End of bottom -->

        </div>
        
        <!-- right side (function) -->
        <div class="col-md-4">
            <div class="row">
                <!-- Link to Manage Activity -->
                <a href="<?php echo URLROOT ?>/activity" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="manage activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/manage activity.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Join Activity -->
                <a href="<?php echo URLROOT ?>/activity/joined" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="join activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/join activity.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Join Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Manage Personal Activity -->
                <a href="<?php echo URLROOT ?>/peractivity" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px; margin-top:14px" alt="manage personal activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/personal activity.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Manage Personal Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Create Personal Activity -->
                <a href="<?php echo URLROOT ?>/peractivity/create" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px; margin-top:14px" alt="create personal activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/create.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Create Personal Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Approved Personal Activity -->
                <a href="<?php echo URLROOT ?>/peractivity/approved" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;height: 50px; margin-top:14px" alt="approved personal activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/approved PA.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Approved Personal Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Pending Feedback -->
                <a href="<?php echo URLROOT ?>/feedback" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="pending icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/pending.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Pending Feedback
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Approved Feedback -->
                <a href="<?php echo URLROOT ?>/feedback" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="approved feedback icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/approved feedback.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px; margin-left:57px">
                            Approved Feedback
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End of right side -->

    </div>
</div>