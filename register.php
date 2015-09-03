<?php
	require_once(__DIR__.'/framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏', array('/common/css/navigation.css')); ?>
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
		<h1>브리드짐에 오신 것을 환영합니다!</h1>
		<form id='registerForm'>
			<div>
				<div class="form-group">
					<label for="email">이메일</label>
					<input type="email" class="form-control" id="email" placeholder="Input Email">
				</div>
			</div>
			<div class="form-group">
				<label for="password">비밀번호</label>
				<input type='password' class='form-control' id='password' placeholder='Input Password'>
			</div>
			<div class='row'>
				<div class='form-group col-xs-8'>
					<label for='name'>이름</label>
					<input type='text' class='form-control' id='name' placeholder='Input Name'>	
				</div>
				<div class='form-group col-xs-4'>
					<label for='sex'>성별</label>
					<div class='radio' id='sex'>
						<label class='radio-inline'>
							<input type='radio' name='sexRadio' id='optionSex1' value='male' checked>
							남자
						</label>
						<label class='radio-inline'>
							<input type='radio' name='sexRadio' id='optionSex2' value='female'>
							여자
						</label>
					</div>
				</div>
			</div>

			<div class='form-group'>
				<label for='닉네임'>닉네임</label>
				<input type='text' class='form-control' id='nickname' placeholder='Input Nickname'>
			</div>

			<div class='form-group'>
				<label for='phone'>전화번호</label>
				<input type='text' class='form-control' id='phone' placeholder='Input Phone number'>
			</div>
			<div class='form-group'>
				<label for='birthday'>생년월일</label>
				<input type='date' class='form-control' id='birthday'>
			</div>

			<button type='submit' class='btn btn-primary'>가입</button>
			<button type='reset' class='btn btn-default'>초기화</button>
		</form>

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
