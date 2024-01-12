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
        <div class="col-md-6">
        
            <?php if($_SESSION['user_role'] == "Partner"): ?>
                <!-- Num of activity created -->
                <a href="<?php echo URLROOT ?>/activity"> 
                    <div class="row" style="width: 97%; margin-left: 20px;">                              
                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 text-success me-2">
                                    <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="created activity" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/created activity.png"/>
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
                    </div>           
                </a>
                <!-- End of Num of activity created -->
            <?php endif; ?>
        

            <!-- Number of students registered to all activity created -->
            <div class="row" style="width: 97%; margin-left: 20px;">
                <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-6 mb-3">
                    <div class="d-flex align-items-center">
                        <span class="fs-3 text-success me-2">
                            <img class="mw-100 mh-300px card-rounded-bottom w-80px" style="width: 50px;" alt="student associated" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/participant.png"/>
                        </span>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="margin-left: 50px;">
                            Students associated: 
                        </span>

                        <?php foreach($data_5['totalStu'] as $totalStu): ?>
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
        <div class="col-md-6">
            <div class="row">
                <!-- Link to Manege Activity -->
                <a href="<?php echo URLROOT ?>/activity" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="activity icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/manage activity.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Activity
                        </span>
                    </div>
                </a>
            </div>

            <div class="row">
                <!-- Link to Manege Personal Activity -->
                <a href="<?php echo URLROOT ?>/feedback" class="card hover-elevate-up shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <img class="mw-100 mh-300px card-rounded-bottom" style="width: 50px;" alt="feedback icon" src="<?php echo URLROOT ?>/public/assets/media/svg/dashboard/feedback.png"/>

                        <span class="text-gray-700 parent-hover-primary fs-1 fw-bold" style="padding-top: 8px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Feedback
                        </span>
                    </div>
                </a>
            </div>

        </div>
        <!-- End of right side -->

    </div>

</div>