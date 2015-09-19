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
			<div class='col-md-2 col-xs-12 sidebar'>
				<div class='smallTitle'>
					<h3>BreatheGym 소개</h3>
				</div>
				<ul class='row list-unstyled introduceList'>
					<a href='gym.php'><li class='col-md-12 col-xs-4'>
						+ 매장소개
					</li></a>
					<a href='gymservice.php?no=1'>
					<li class='col-md-12 col-xs-4'>
						+ 이용시간
					</li></a>
					<a href='gymservice.php?no=1'><li class='col-md-12 col-xs-4'>1호점</li></a>
					<a href='gymservice.php?no=2'><li class='col-md-12 col-xs-4'>2호점</li></a>
					<a href='gymstaff.php'>
					<a href='gymstaff.php'>
						<li class='col-md-12 col-xs-4 listActive'>
						+ 스탭소개
						</li>
					</a>
				</ul>
			</div>
			<div class="content col-md-10 col-xs-12 mt text-left">
				<div class="text-center">
					<img width='100%' src="/introduction/images/breathegym1st.jpg" alt="BreatheGym 1st">
				</div>
				<div class="panel panel-default col-sm-5 mt staff-panel">
					<div class="panel-body">
						<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
					</div>
					<div class="panel-footer">Panel footer</div>
				</div>

				<div class="panel panel-default col-sm-5 col-sm-offset-2 mt staff-panel">
					<div class="panel-body">
						<img src="/introduction/images/tyson.jpg" alt="Boxer Ali">
					</div>
					<div class="panel-footer">Panel footer</div>
				</div>

				<div class="text-center highmt">
					<img width='100%' src="/introduction/images/breathegym2nd.jpg" alt="BreatheGym 2nd">
				</div>

				<div class="panel panel-default col-sm-5 mt staff-panel">
					<div class="panel-body">
						<img src="/introduction/images/rocky.jpg" alt="Boxer Ali">
					</div>
					<div class="panel-footer">Panel footer</div>
				</div>

				<div class="panel panel-default col-sm-5 col-sm-offset-2 mt staff-panel">
					<div class="panel-body">
						<img src="/introduction/images/ippo.jpg" alt="Boxer Ali">
					</div>
					<div class="panel-footer">Panel footer</div>
				</div>


			</div>
		</div>
		<!-- FOOTER -->
		
		</div><!-- /.container -->
		<footer class='grayBackground'>
			<div class='row container'>
				<div class='col-md-4 col-xs-12'>
					<img src = "/resources/teambreathelogo.png"/>
				</div>
				<div class='col-md-8 col-xs-12'>
					<p>브리드 복싱 짐 &amp; 크로스핏</p>
					<p>BreatheGym.com은 Team Breathe, Inc의 소유입니다.</p>
					<p class='pull-right'><a href='#'>Back to top</a></p>
					<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
				</div>
			</div>
		</footer>
	<!-- script references -->
	<?php scripts(array('/common/js/navigation.js','js/introduction.js')) ?>
</body>
</html>
