<?php
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏-회원운동기록관리',
	array('/common/font-awesome/css/font-awesome.css',
          '/common/css/style.css',
          '/common/css/style-responsive.css',
		  '/exercise/css/exercise.css'
        ));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php memberHeader();
	memberSidebar("index"); ?>
	<!--maincontent start-->
	<section id = "main-content">
		<section class = "wrapper">
			<div class = "col-lg-12 mt">
				<div class = "row">
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>크로스핏 순위</h5>
							</div>
							<h3>상위 %</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>복싱 진도</h5>
							</div>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>연속출석일</h5>
							</div>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>등록일</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "col-lg-12">
				<div class="row">
					<!--복싱진도가 보일 부분 start-->
					<div class = "col-md-6 col-sm-6 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>오늘의 복싱 진도</h5>
							</div>
							<img src = "/exercise/img/boxing.jpg">
							<div class ="progress">
								<div class = "progress-bar progress-bar-success" role="progressbar"
								aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
								<span>잽운동</span>
								</div>
							</div>
						</div>
					</div>
					<!--복싱진도가 보일 부분 end -->
					<!--크로스핏 부분 start -->
					<div class = "col-md-6 col-sm-6 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>오늘의 크로스핏</h5>
							</div>
							<img src = "/exercise/img/crossfit.jpg">
							<h5>오늘 회원님은 상위 %의 기록을 달성하였습니다.</h5>
						</div>
					</div>
					<!--크로스핏 부분 end -->
				</div>
			</div>
		</section>
		<!--maincontent end-->

	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/common-scripts.js"></script>

</body>
</html>
