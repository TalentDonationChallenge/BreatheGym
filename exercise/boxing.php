<?php 
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('회원운동기록관리-복싱', 
	array('./assets/font-awesome/css/font-awesome.css',
		'./assets/css/style.css',
		'./assets/css/style-responsive.css',
		'./assets/css/table-responsive.css',
		'./assets/css/to-do.css',
		'./assets/css/zabuto_calendar.css',
		'./assets/css/bootstrap.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<!--header start-->
	<?php memberHeader("복싱","boxing"); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("boxing"); ?>
	<!--sidebar end-->
	<section id = "main-content">
				<section class = wrapper>
					<div class = "row2">
						
							<div class = "boxprogress2">
								<h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
                                 <h2>잽운동</h2>
								<div class = "boxing">
									<img class = "boximg" src = "./assets/img/boxingimg.jpg" width="100%" height="30%">
								</div>
                                
                                <div class="featurette">
                                    <h2>연습방법</h2>
                                    <p class="lead">저도 잘 몰라요. 그냥 열심히 하시면 됩니다.</p>
                                </div>
							</div>
					</div>
                    <div class = "row3">
                        
                        <div class = "boxprogress3">
                            <h4><i class = "fa fa-angle-right"></i>현재 내 진도</h4>
                            <p>잽운동</p>
                            <div class = "boxing">
                                <img class = "boximg" src = "./assets/img/boxingimg.jpg" width="100%" height="30%">
                                    </div>
                            
                            <div class ="progress">
                                <div class = "progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
                                    <span class = "sr-only">20% complete</span>
                                </div>
                            </div>
                        </div>
                        <div class = "boxprogress4">
                            <h4><i class = "fa fa-angle-right"></i>다음 진도</h4>
                            <p>뎀프시롤</p>
                            <div class = "boxing">
                                <img class = "boximg" src = "./assets/img/boxingimg.jpg" width="100%" height="30%">
                                    </div>
                            
                            <div class ="progress">
                                <div class = "progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
                                    <span class = "sr-only">20% complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
					 </div>
					
				</section>
				 <footer class="site-footer">
                <div class="text-center">
                    2015 - 크레센도
                    <a href="boxing.php#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
			</section>
	    <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        
        
        <!--common script for all pages-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        
        <!--script for this page-->
        <script src="assets/js/morris-conf.js"></script>
</body>
</html>