<?php
require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏', array('/common/css/navigation.css','help.css')); ?>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php
	login();
	navigation();
	?>
	<!-- Marketing messaging and featurettes
	================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class='container register'>
		<p class="success">입력하신 이메일로 비밀번호를 전송했습니다.
		</p>
		<br/>
		<div class='text-center'>
			<button type='submit' class='btn btn-primary'>확인</button>
		</div>

		<hr>
		<!-- FOOTER -->
		<div class='container mt'>
			<footer>
				<p>브리드 복싱 짐 &amp; 크로스핏</p>
				<p>1호점 : 경기도 안산시 어쩌구저쩌구</p>
				<p>2호점 : 경기도 안산시 상록구 어쩌구</p>
				<p class='pull-right'><a href='#'>Back to top</a></p>
				<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
			</footer>
		</div>

	</div><!-- /.container -->
	<?php scripts(array('/common/js/navigation.js','/common/js/register.js')) ?>
</body>
</html>
