<?php 
	require_once(__DIR__.'/framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 에러페이지', array('/common/css/navigation.css')); ?>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php 
		login();
		navigation();
	?>
	<h1>ERROR PAGE</h1>
	<p>알 수 없는 문제가 발생했습니다.</p>
	<a href="index.php">홈으로</a>
	<div class='container marketing'>
		<!-- FOOTER -->
		<footer>
			<p>브리드 복싱 짐 &amp; 크로스핏</p>
			<p>1호점 : 경기도 안산시 어쩌구저쩌구</p>
			<p>2호점 : 경기도 안산시 상록구 어쩌구</p>
			<p class='pull-right'><a href='#'>Back to top</a></p>
			<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
		</footer>
	</div><!-- /.container -->
	<?php scripts(array('/common/js/navigation.js')) ?>
</body>
</html>