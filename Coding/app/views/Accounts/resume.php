<?php
foreach ($data['studentProfile'] as $studentProfile) :
?>
<?php endforeach; ?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Resume</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Resume Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 

</head> 

<body>	

    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="row">
				    <div class="col-block col-md-auto resume-picture-holder text-center text-md-start" style="margin-left:20px;margin-top:15px">
				        <img class="icon w-125px h-150px" src="<?php echo URLROOT."/public/".$studentProfile->st_image; ?>" alt="">
				    </div><!--//col-->
				    <div class="col">
					    <div class="row p-4 justify-content-center justify-content-md-between">
						    <div class="primary-info col-auto">
							    <h1 class="name mt-0 mb-1 text-uppercase text-uppercase"><?php echo $studentProfile->st_fullname ?></h1>
							    <div class="title mb-3" style="font-style:italic"><?php echo $_SESSION['user_role']; ?></div>
							    <ul class="list-unstyled">
								    <li class="mb-2"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i><?php echo $_SESSION['email']; ?></li>
								    <li><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i><?php echo $studentProfile->st_phone; ?></li>
							    </ul>
						    </div><!--//primary-info-->
                            <div class="secondary-info col-auto mt-2">
                            <button type="submit" id="kt_download_resume" class="btn btn-danger download-btn">Download Resume</button>
						    </div><!--//secondary-info-->
					    </div><!--//row-->
				    </div><!--//col-->
			    </div><!--//row-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
				    <h5 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Description</h5>
				    <div class="resume-section-content">
					    <p class="mb-0" style="font-style:italic"><?php echo $studentProfile->about_me; ?></p>
				    </div>
                    <br>
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-lg-9">
					    <section class="resume-section experience-section mb-5">
						    <h5 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Activities Joined</h5>
						    <div class="resume-section-content">
                            <?php include 'resume_activities.php' ?>
						    </div>
					    </section><!--//experience-section-->
				    </div>
				    <div class="col-lg-3">
					    <section class="resume-section skills-section mb-5">
						    <h5 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h5>
						    <div class="resume-section-content">
						        <?php include 'resume_skills.php' ?>
                            </div>
					    </section><!--//skills-section-->
                        
					    <section class="resume-section education-section mb-5">
						    <h5 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Other Information</h5>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">IC : <?php echo $studentProfile->st_ic ?></div>
								    </li>
								    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">Gender : <?php echo $studentProfile->st_gender ?></div>
								    </li>
                                    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">Race : <?php echo $studentProfile->st_race ?></div>
								    </li>
                                    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">University : <?php echo $studentProfile->univ_code ?></div>
								    </li>
                                    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">Hometown : <?php echo $studentProfile->st_address ?></div>
								    </li>
							    </ul>
						    </div>
					    </section><!--//education-section-->
				    </div>
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article> 

    
    <footer class="footer text-center pt-2 pb-5">
	    <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
    </footer>

    <script src="<?php echo URLROOT ?>/public/assets/js/resume.js"></script>

</body>
</html> 

