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
	<div class="container introduce">
		<div class="row">
			<div class='col-md-3 col-xs-12'>
				<div class='grayBackground'>
					<h3>BreatheGym 소개</h3>
				</div>
				<ul class='row list-unstyled introduceList'>
					<li class='col-md-12 col-xs-4'>
						+ 매장소개
					</li>
					<li class='col-md-12 col-xs-4'>
						+ 이용시간
					</li>
					<li class='col-md-12 col-xs-4'>
						+ 스탭소개
					</li>
				</ul>
			</div>
			<div class='col-md-9 col-xs-12'>
				<div class=''
			</div>
			<!--<div class="panel panel-default col-sm-3 hidden-xs side-bar">
				<ul class="nav nav-pills nav-stacked">
					<li class="list-option">매장소개</li>
					<li class="active"><a href="/introduction/gym.php">1호점</a></li>
					<li class="#"><a href="/introduction/gym2nd.php">2호점</a></li>
					<li class="list-option">이용시간</li>
					<li class="#"><a href="/introduction/gymservice.php?no=1">1호점</a></li>
					<li class="#"><a href="/introduction/gymservice.php?no=2">2호점</a></li>
					<li class="list-option"><a href="/introduction/gymstaff.php">스탭소개</a></li>
				</ul>
			</div>
			<div class="content col-sm-9 mt text-left">
				<div class="text-center">
					<img src="/introduction/images/breathegym1st.jpg" alt="BreatheGym 1st">
				</div>
				<p>abc</p>
			</div>-->
		</div>
		<!-- FOOTER -->
		<footer class='container grayBackground'>
			<img src = "/resources/teambreathelogo.png" class='pull-left'/>
			<p>브리드 복싱 짐 &amp; 크로스핏</p>
			<p>BreatheGym.com은 Team Breathe, Inc의 소유입니다.</p>
			<p class='pull-right'><a href='#'>Back to top</a></p>
			<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
		</footer>
	</div><!-- /.container -->
	<!-- script references -->
	<?php scripts(array('/common/js/navigation.js','js/introduction.js')) ?>
</body>
</html>
