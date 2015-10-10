<?php

//홈페이지에서 페이스북을 통해 회원가입을 할때 사용하는 php 파일입니다.
	//클라이언트에서 양식 폼에 맞게 작성한 데이터를 받아 db에 등록된 회원인지의 여부를 살펴보고 그 결과에 따라 다른 메세지를 클리이언트로 보내주는것이 목적입니다.


	require_once(__DIR__.'/../../framework/framework.php');



	if(isset($_POST['userEmail']) && isset($_POST['userName']) && isset($_POST['userSex']) && isset($_POST['userBirthDay'])){
		$userEmail = $_POST['userEmail'];
		$userName = $_POST['userPassword'];
		$userPassword = '';
		$userPhone = '00000000000';
		$userBarcode = null;
		$facebook = 1;
		$userSex = $_POST['userSex'];
		$userBirthDay = date('Y-m-d',strtotime($_POST['userBirthDay'])));
		$registerDate = date('Y-m-d');
		$userNickName = '';
		$userLevel = 0;

		$getUsercount = UserRegister::isUserExistFromRegisterInfo($userEmail);

	if($getUsercount === "1"){
		echo "user exist";
	}
	else if($getUsercount === "0"){
		//유저가 없으니 회원으로 가입시킵니다.
		echo "회원등록";
		UserRegister::registerUserToDatabase($userEmail,$userPassword,$userName,
			$userPhone,$userBarcode,$userBirthDay,
			$facebook,$userSex,$registerDate,
			$userNickName,$userLevel);

	}

	}
	else{
		header("HTTP/1.1 400 Invalid Request");
				die("HTTP/1.1 400 Invalid Request - your input is invalid.");
	}




?>
