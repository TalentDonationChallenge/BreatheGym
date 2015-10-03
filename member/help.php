<?php
require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏', array('/common/css/navigation.css','/member/css/member.css')); ?>
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
		<div class='container'>
			<div class='mt'>
				<h3 class='text-center'>I D &amp; P A S S W O R D</h3>
			</div><br/>
			<h5 class='text-center'>아이디 찾기</h5>

			<hr>
			<form action="signFromWeb.php" method="POST" id='registerForm' class='form-horizontal'>
				<div class='form-group'>
					<label for='name' class='col-xs-2'>이름</label>
					<div class='col-xs-6'>
						<input type='text' class='form-control' id='name' placeholder='Input Name' name = "userName">	
					</div>
				</div>
				<br/>
				<div class='form-group'>
					<label for='birthday' class='col-xs-2'>생년월일</label>
					<div class='col-xs-9'>
						<input type='date' class='form-control' id='birthday' name = "userBirthDay">
					</div>
				</div>
				<div class='text-center'>
					<button type='submit' class='btn btn-primary'>확인</button>
				</div>
				<br/><br/><hr>
				<h5 class='text-center'>비밀번호 찾기</h5>
				<br/>
				<div class="form-group" id='emailGroup'>
					<label for="email" class='col-xs-2'>이메일</label>
					<div class='col-xs-9'>
						<input type='email' class="form-control" id='email' placeholder='Input Email' name = "userEmail">
						<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
						<div class='alert alert-danger' id='emailAlert' role='alert' hidden='true'>올바른 이메일을 입력해주세요! 예시)email@breathegym.gym</div>
					</div>
				</div>
				<div class='text-center'>
					<button type='submit' class='btn btn-primary'>확인</button>
				</div>
			</form>
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
