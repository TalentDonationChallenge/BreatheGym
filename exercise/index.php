<?php 
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏-회원운동기록관리', 
	 array('/exercise/css/font-awesome/css/font-awesome.css',
        '/exercise/css/style.css',
        '/exercise/css/style-responsive.css',
        '/exercise/css/table-responsive.css',
        '/exercise/css/to-do.css',
        '/exercise/css/zabuto_calendar.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<!--header start-->
	<?php memberHeader();?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("index"); ?>
	<!--sidebar end-->
	<!--maincontent start-->
	<section id = "main-content">
				<section class = wrapper>
					<div class = "row">
						<div class = "main-chart">
							<div class = "row mtbox">
								<div class = "col-md-2 col-sm-2 col-md-offset1 box0">
                                    <div class = "box1">
										
                                        <h3>상위</h3>
                                        <h4>90%</h4>
									</div>
									<p>당신은 상위 90%! 분발하세</p>
								</div>
								<div class = "col-md-2 col-sm-2 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>진행률</h3>
										<h4>25%</h4>
									</div>
									<p>운동 진행률</p>
								</div>
								<div class = "col-md-2 col-sm-2 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>출석률</h3>
										<h4>25%</h4>
									</div>
									<p>이번달 출석률 왜이럼?</p>
								</div>
								<div class = "col-md-2 col-sm-2 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>등록일</h3>
										<h4>D-21</h4>
									</div>
									<p>남은 21일 동안 열심히 해보자!</p>
								</div>
							</div>
						</div>
					</div>
                    <!--복싱진도가 보일 부분 start-->
					<div class = "col8">
                        <a href="/exercise/boxing/index.php">
                            <div class = "indexprogress">
                                <h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
                                <div class = "boxing">
                                    <img src = "/exercise/img/boxingimg.jpg" width="100%" height="30%">
                                        </div>
                                <p>잽운동(클릭하면 상세 페이지로 넘어갑니다.)</P>
                                <div class ="progress">
                                    
                                    <div class = "progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
                                        
                                        <span class = "sr-only">20% complete</span>
                                    </div>
                                </div>
                            </div>
                            
                        </a>

                    </div>
                     <!--복싱진도가 보일 부분 end -->
                      <!--크로스핏 부분 start -->
                      <div class = "col8">
                          <a href="/exercise/crossfit/index.php">
                              <div class = "indexprogress">
                                  <h4><i class = "fa fa-angle-right"></i>오늘의 크로스핏</h4>
                                  <div class = "boxing">
                                      <img src = "/exercise/img/crossfit.jpg" width="100%" height="280px">
                                          </div>
                                  <p>(클릭하면 상세 페이지로 넘어갑니다.)</P>
                                 
                              </div>
                              
                          </a>
                          
                      </div>
                      <!--크로스핏 부분 end -->
				</section>
            </section>
			<!--maincontent end-->
            
		</section>
	    <script src="/exercise/js/jquery.js"></script>
        <script src="/exercise/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="/exercise/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/exercise/js/jquery.scrollTo.min.js"></script>
        <script src="/exercise/js/jquery.nicescroll.js" type="text/javascript"></script>
        
        
        <!--common script for all pages-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="/exercise/js/common-scripts.js"></script>
        
        <!--script for this page-->
        <script src="/exercise/js/morris-conf.js"></script>
</body>
</html>