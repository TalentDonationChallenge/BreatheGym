<?php
require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 매장소개',
	array('/common/css/navigation.css', 'css/introduction.css')); ?>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<script src="/common/js/facebook.js"></script>

	<!-- 페이스북 SDK load -->
	<?php
	login();
	navigation();
	?>
	<div class="container marketing">
		
		<div class="row">
			<div class="panel panel-default col-sm-3 hidden-xs side-bar">
				<ul class="nav nav-pills nav-stacked">
					<li class="list-option">매장소개</li>
					<li class="#"><a href="/introduction/gym.php">1호점</a></li>
					<li class="active"><a href="/introduction/gym2nd.php">2호점</a></li>
					<li class="list-option">이용시간</li>
					<li class="#"><a href="/introduction/gymservice.php?no=1">1호점</a></li>
					<li class="#"><a href="/introduction/gymservice.php?no=2">2호점</a></li>
					<li class="list-option"><a href="/introduction/gymstaff.php">스탭소개</a></li>
				</ul>
			</div>
			<div class="content col-sm-9 mt text-left">
				<div class="text-center">
					<img src="/introduction/images/breathegym2nd.jpg" alt="BreatheGym 1st">
				</div>
				<p>abc</p>
			</div>
		</div>
		<!-- FOOTER -->

		<div class="row">
			<div class="col-sm-3">
				<img src="/introduction/images/teambreathelogo.png" alt="BreatheGym Logo">
			</div>
			<footer class="text-center col-sm-9 mt">
				<p>BreatheGym.com은 Team Breathe, Inc의 소유입니다. BreatheGym.com의 정보는 비영리적인 목적을 위해서만 사용할 수 있습니다.</p>
				<p>Copyright © 2015 Team Breathe. All rights reserved.</p>
				<p class="pull-right"><a href="#">Back to top</a></p>
			</footer>
		</div>
		
	</div><!-- /.container -->
	<!-- script references -->
	<?php scripts(array('/common/js/navigation.js','js/introduction.js')) ?>
</body>
</html>
