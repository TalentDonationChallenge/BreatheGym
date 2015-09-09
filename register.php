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
		<div class='container'>
		<div class='mt'>
			<h3 class='text-center'>R E G I S T E R</h3>
		</div><br/><br/>
		<h5 class='text-center'>브리드짐에 오신 것을 환영합니다!</h5>
		<h5 class='text-center'>브리드짐의 모든 서비스를 이용하기 위해 회원가입 해주세요.</h5>
		
		<hr>
		<form id='registerForm' class='form-horizontal'>
			<div class="form-group" id='emailGroup'>
				<label for="email" class='col-xs-2'>이메일</label>
				<div class='col-xs-9'>
					<input type='email' class="form-control" id='email' placeholder='Input Email'>
					<span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>
					<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
					<div class='alert alert-danger' id='emailAlert' role='alert' hidden='true'>올바른 이메일을 입력해주세요! 예시)email@breathegym.gym</div>
				</div>
				<div class='col-xs-1'>
					<button class='btn btn-default' id='emailConfirm'>확인</button>
				</div>
			</div>
			<br/>
			<div class="form-group" id='passwordGroup'>
				<label for="password" class='col-xs-2'>비밀번호</label>
				<div class='col-xs-10'>
					<input type='password' class='form-control' id='password' placeholder='Input Password'>
					<span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>
					<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
					<div class='alert alert-danger' id='passwordAlert' role='alert' hidden='true'>영문자 대소문자, 숫자가 포함되어야 합니다.</div>
				</div>
			</div>
			<br/>
			<div class="form-group" id='passwordConfirmGroup'>
				<label for='password' class='col-xs-2'>비밀번호<br/>확인</label>
				<div class='col-xs-10'>
					<input type='password' class='form-control' id='passwordConfirm' placeholder='Input Password again'>
					<span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>
					<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
					<div class='alert alert-danger' id='passwordConfirmAlert' role='alert' hidden='true'>같은 비밀번호를 입력하세요.</div>
				</div>
			</div>
			<br/>
			<div class='row'>
				<div class='form-group col-xs-6'>
					<label for='name' class='col-xs-4'>이름</label>
					<div class='col-xs-8'>
						<input type='text' class='form-control' id='name' placeholder='Input Name'>	
					</div>
				</div>
				<div class='form-group col-xs-6'>
					<label for='sex' class='col-xs-4'>성별</label>
					<div class='radio col-xs-8' id='sex'>
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
			<br/>
			<div class='form-group'>
				<label for='닉네임' class='col-xs-2'>닉네임</label>
				<div class='col-xs-10'>
					<input type='text' class='form-control' id='nickname' placeholder='Input Nickname'>
				</div>
			</div>
			<br/>
			<div class='form-group'>
				<label for='phone' class='col-xs-2'>전화번호</label>
				<div class='col-xs-10'>
					<input type='text' class='form-control' id='phone' placeholder='Input Phone number'>
				</div>
			</div>
			<br/>
			<div class='form-group'>
				<label for='birthday' class='col-xs-2'>생년월일</label>
				<div class='col-xs-10'>
					<input type='date' class='form-control' id='birthday'>
				</div>
			</div>
			<br/>
			<div class='text-center'>
				<button type='submit' class='btn btn-primary'>가입</button>
				<button type='reset' class='btn btn-default'>초기화</button>
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
