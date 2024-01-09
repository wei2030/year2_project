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
            <?php if($_SESSION['user_role'] == "Partner"): ?>
                <!-- Num of activity created -->
                <div class="row">
                    <a href="<?php echo URLROOT ?>/activity">           
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 text-success me-2">
                                    <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>
                                </span>

                                <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                    Created activities:  
                                </span>

                                <?php foreach($data_4['numAct'] as $numAct): ?>
                                    <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $numAct->numAct ?>" style="margin-left: 10px;">
                                        <?php echo $numAct->numAct; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>            
                    </a>
                </div>
                <!-- End of Num of activity created -->
            <?php endif ?>

            <!-- Number of students registered to all activity created -->
            <div class="row">
                <a href="<?php echo URLROOT ?>/activity">
                    <div class="row">
                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 text-success me-2">
                                    <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/activity.png"/>
                                </span>

                                <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                                    Number of students registered: 
                                </span>

                                <?php foreach($data_5['totalStu'] as $totalStu): ?>
                                    <div class="text-gray-700 parent-hover-primary fs-1 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo $totalStu->totalStu ?>" style="margin-left: 10px;">
                                        0
                                    </div>
                                <?php endforeach; ?>
                            </div>
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
        </div>
        <!-- End of right side -->

    </div>

</div>