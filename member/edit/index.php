<?php
require_once(__DIR__.'/../../framework/framework.php');
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
	$memberInfo = Member::loadInfo();
	if ($memberInfo[1] == 0) {
		$memberInfo[1] = "남성";
	} else {
		$memberInfo[1] = "여성";
	}
	?>
	<!-- Marketing messaging and featurettes
	================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class='container register'>
		<div class='container'>
			<div class='mt'>
				<h3 class='text-center'>M O D I F Y</h3>
			</div><br/>
			<h5 class='text-center'>회원 정보 수정</h5>

			<hr>
			<form id='registerForm' class='form-horizontal'>
				<div class="form-group" id='emailGroup'>
					<label for="email" class='col-xs-2'>이메일</label>
					<div class='col-xs-9'>
						<!-- <input type='email' class="form-control" id='email' placeholder='Input Email' name = "userEmail"> -->
						<p class="form-control-static"><?=$_SESSION['email']?></p>
						<!-- <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span> -->
						<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
						<div class='alert alert-danger' id='emailAlert' role='alert' hidden='true'>올바른 이메일을 입력해주세요! 예시)email@breathegym.gym</div>
					</div>
					<!-- <div class='col-xs-1'>
						<button class='btn btn-default' id='emailConfirm'>확인</button>
					</div> -->
				</div>
				<br/>
				<div class="form-group" id='passwordGroup'>
					<label for="password" class='col-xs-2'>비밀번호</label>
					<div class='col-xs-9'>
						<input type='password' class='form-control' id='password' placeholder='Input Password' name = "userPassword">
						<!-- <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span> -->
						<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
						<div class='alert alert-danger' id='passwordAlert' role='alert' hidden='true'>영문자 대소문자, 숫자가 포함되어야 합니다.</div>
					</div>
				</div>
				<br/>
				<div class="form-group" id='passwordConfirmGroup'>
					<label for='password' class='col-xs-2'>비밀번호<br/>확인</label>
					<div class='col-xs-9'>
						<input type='password' class='form-control' id='passwordConfirm' placeholder='Input Password again'>
						<!-- <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span> -->
						<span class='glyphicon glyphicon-danger-sign form-control-feedback' aria-hidden='true'></span>
						<div class='alert alert-danger' id='passwordConfirmAlert' role='alert' hidden='true'>같은 비밀번호를 입력하세요.</div>
					</div>
				</div>
				<br/>


				<!-- 이름만 튀어나와서 margin-left 10px줌 줄 넘어가서 col-xs-8 -> 6으로 바꿈 -->
				<div class='row'>
					<div class='form-group col-xs-6'>
						<label for='name' class='col-xs-4 ml'>이름</label>
						<div class='col-xs-6'>
							<!-- <input type='text' class='form-control' id='name' placeholder='Input Name' name = "userName">	 -->
							<p class="form-control-static"><?=$memberInfo[0]?></p>
						</div>
					</div>

					<div class='form-group col-xs-6'>
						<label for='sex' class='col-xs-2'>성별</label>
						<div class='radio col-xs-8 pr' id='sex'>
							<?=$memberInfo[1]?>
						</div>
					</div>
				</div>

				<br/>
				<div class='form-group' id='nicknameGroup'>
					<label for='닉네임' class='col-xs-2'>닉네임</label>
					<div class='col-xs-9'>
						<input type='text' class='form-control' id='nickname' placeholder='Input Nickname' value=<?=$memberInfo[2]?> name = "userNickName">
						<div class='alert alert-danger' role='alert' id='nicknameAlert' hidden='true'>닉네임을 입력해주세요</div>
					</div>
				</div>
				<br/>
				<div class='form-group' id='phoneGroup'>
					<label for='phone' class='col-xs-2'>전화번호</label>
					<div class='col-xs-9'>
						<input type='text' class='form-control' id='phone' placeholder='Input Phonenumber' value=<?=$memberInfo[3]?> name = "userPhone">
						<div class='alert alert-danger' role='alert' id='phoneAlert' hidden='true'>전화번호를 입력해주세요</div>
					</div>
				</div>
				<br/>
				<div class='form-group'>
					<label for='birthday' class='col-xs-2'>생년월일</label>
					<div class='col-xs-9'>
						<!-- <input type='date' class='form-control' id='birthday' name = "userBirthDay"> -->
						<p class="form-control-static"><?=$memberInfo[4]?></p>
					</div>
				</div>
				<br/>
				<div class='text-center'>
					<a type='submit' class='btn btn-primary' id='modify'>수정</a>
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
	<?php scripts(array('/common/js/navigation.js','/member/js/modify.js')) ?>
</body>
</html>
