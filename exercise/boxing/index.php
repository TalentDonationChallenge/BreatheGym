<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 회원운동기록관리',
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
	<!--header start-->
	<?php memberHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("boxing"); ?>
	<!--sidebar end-->
	<section id = "main-content">
		<section class = "wrapper">
			<div class = "col-lg-12 mt">
				<div class="showback">
				<h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
				<div class="progress">
				</div>
				<h2>잽운동</h2>
				<!-- 16:9 동영상 -->
				<div class="col-md-6">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CWBqwq8GgGU"></iframe>
					</div>
				</div>
				<div class="col-md-6">
					<h2>연습방법</h2>
					<p class="lead">저도 잘 몰라요. 그냥 열심히 하시면 됩니다.</p>
					<p class="lead">근데 과연 잘 할 수 있을까요?</p>
					<p class="lead">후후</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class = "showback">
				<h4><i class = "fa fa-angle-right"></i>이전 내 진도</h4>
				<p>잽운동</p>
				<img src = "/exercise/img/boxingimg.jpg">
			</div>
		</div>
		<div class="col-md-6">
			<div class = "showback">
				<h4><i class = "fa fa-angle-right"></i>다음 진도</h4>
				<p>뎀프시롤</p>
				<img src = "/exercise/img/boxingimg.jpg">
			</div>
		</div>
		</section>
	</section>
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<script src="/common/js/common-scripts.js"></script>


</body>
</html>
