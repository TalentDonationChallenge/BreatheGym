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
					<li class="active"><a href="#">매장소개</a></li>
					<li><a href="#">운동시간표</a></li>
					<li><a href="#">스탭소개</a></li>
				</ul>
			</div>
			<div class="content col-sm-8 col-offset-1">
				<p>abc</p>
			</div>
		</div>
		<!-- FOOTER -->
		<footer>
			<p>브리드 복싱 짐 &amp; 크로스핏</p>
			<p>1호점 : 경기도 안산시 어쩌구저쩌구</p>
			<p>2호점 : 경기도 안산시 상록구 어쩌구</p>
			<p class="pull-right"><a href="#">Back to top</a></p>
			<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
		</footer>

	</div><!-- /.container -->
	<!-- script references -->
	<?php scripts(array('/common/js/navigation.js','js/introduction.js')) ?>
</body>
</html>
