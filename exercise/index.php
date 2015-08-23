<?php
	require_once(__DIR__.'/../framework/framework.php');
	require_once(__DIR__.'/memberRecordsFromServer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏-회원운동기록관리',
	array('/common/font-awesome/css/font-awesome.css',
          '/common/css/style.css',
          '/common/css/style-responsive.css'
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
		<section class = "wrapper">
			<div class = "row">
				<div class = "col-lg-11 main-chart" >
					<div class = "row mtbox">
						<div class = "col-md-3 col-sm-5 mb">
							<div class="white-panel pn">
								<div class = "white-header">
									<h5>크로스핏 순위</h5>
								</div>
								<h3>상위 %</h3>
							</div>
						</div>
						<div class = "col-md-3 col-sm-5 mb">
							<div class="white-panel pn">
								<div class = "white-header">
									<h5>복싱 진도</h5>
								</div>
							</div>
						</div>
						<div class = "col-md-3 col-sm-5 mb">
							<div class="white-panel pn">
								<div class = "white-header">
									<h5>연속출석일</h5>
								</div>
							</div>
						</div>
						<div class = "col-md-3 col-sm-5 mb">
							<div class="white-panel pn">
								<div class = "white-header">
									<h5>등록일</h5>
								</div>
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
				<h4>오늘 회원님은 상위 <!--<?php //printf($myrecordPercentage)?>-->%의 기록을 달성하였습니다.</h4>
				</div>

				</div>


				</a>

				</div>
			</div>
			<!--크로스핏 부분 end -->
		</section>
		<!--maincontent end-->

	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/common-scripts.js"></script>

</body>
</html>
