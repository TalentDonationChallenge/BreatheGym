<?php 
	require_once(__DIR__.'/../framework/framework.php');
	require_once(__DIR__.'/memberRecordsFromServer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏-회원운동기록관리', 
	array('/exercise/css/font-awesome/css/font-awesome.css',
          '/exercise/css/style.css',
          '/exercise/css/style-responsive.css'
        ));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!--이것은 지금 로그인 한 사람이 이름이 강민호, 바코드 djdbffuq123 인 사람이라고 생각하고 코딩한 것임 -->
	<?php
		// $datearray = getUserDurationDate('jfyf7q719');
		// $gymMemverrecord = getUserExerciseRecord('jfyf7q719');
		// 	$courseA = $gymMemverrecord[0]['ranking'];
		// 	$courseB = $gymMemverrecord[1]['ranking'];
		// 	$courseC = $gymMemverrecord[2]['ranking'];
		// 	$myrecordPercentage = ((($courseA + $courseB + $courseC)/3));
			
		//print_r($datearray);
	?>
	<!--header start-->
	<?php memberHeader();?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("index"); ?>
	<!--sidebar end-->
	<!--maincontent start-->
	<section id = "main-content">
				<section class = wrapper>
					<div class = "row3" id ="menucontainer">
						<div class = "main-chart" >
							<div>
								<p>어서오세요 <?php //printf($datearray[0]) ?>회원님</p>
							</div>
							<div class = "row mtbox">
								<div class = "col-md-3 col-sm-3 col-md-offset1 box0">
                                    <div class = "box1">
										
                                        <h3>상위</h3>
                                        <h4>%</h4>
									</div>
									<p>당신은 상위 %! 분발하세</p>
								</div>
								<div class = "col-md-3 col-sm-3 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>진행률</h3>
										<h4>25%</h4>
									</div>
									<p>운동 진행률</p>
								</div>
								<div class = "col-md-3 col-sm-3 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>출석률</h3>
										<h4><?php //printf($datearray[2])?>%</h4>
									</div>
									<p>이번달 출석률 왜이럼?</p>
								</div>
								<div class = "col-md-3 col-sm-3 col-md-offset1 box0">
									<div class = "box1">
										
										<h3>등록일</h3>
										<h4><?php //printf($datearray[1])?></h4>
									</div>
									<p>남은 <?php// printf($datearray[3])?> 일동안 열심히 해보자!</p>
								</div>
							</div>
						</div>
					</div>
                    <!--복싱진도가 보일 부분 start-->
	                  <div class = "menucontainer">
						<div class = "col-md-6 col-sm-6 box0">
	                        <a href="/exercise/boxing/index.php">
	                            <div>
	                                <h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
	                                <div class = "boxing">
	                                    <img src = "/exercise/img/boxingimg.jpg" width="100%" height="260px">
	                                </div>
	                              
	                                <div class ="progress">
	                                    
	                                    <div class = "progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
	                                        
	                                        <span>잽운동</span>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                        </a>

	                    </div>
	                     <!--복싱진도가 보일 부분 end -->
	                      <!--크로스핏 부분 start -->
	                    <div class = "col-md-6 col-sm-6 box0">
	                        <a href="/exercise/crossfit/index.php">
	                            <div>
	                                <h4><i class = "fa fa-angle-right"></i>오늘의 크로스핏</h4>
	                                <div class = "boxing">
	                                    <img src = "/exercise/img/crossfit.jpg" width="100%" height="260px">
	                                </div>
	                                  
	                                <div id = "mrecord">
	                              		<h4>오늘 회원님은 상위 <?php //printf($myrecordPercentage)?>%의 기록을 달성하였습니다.</h4>
	                            	</div>
	                                 
	                            </div>

	                              
	                        </a>
	                          
	                    </div>
	                </div>
                      <!--크로스핏 부분 end -->
				</section>
            </section>
			<!--maincontent end-->
            
		</section>
	     <script src="/exercise/js/jquery.js"></script>
	     <script class="include" type="text/javascript" src="/exercise/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/exercise/js/common-scripts.js"></script>
        <script src="/exercise/js/bootstrap.min.js"></script>
        <script src="/exercise/js/jquery.nicescroll.js" type="text/javascript"></script>
       
</body>
</html>