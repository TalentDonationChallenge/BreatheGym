<?php

    //홈페이지에서 가입양식을 통해 회원가입을 할때 사용하는 php 파일입니다.
	//클라이언트에서 양식 폼에 맞게 작성한 데이터를 받아 db에 등록된 회원인지의 여부를 살펴보고 그 결과에 따라 다른 메세지를 클리이언트로 보내주는것이 목적입니다.

	require_once(__DIR__.'/../../framework/framework.php');

	//submit 버튼을 통해 클라이언트에서 데이터를 보내면 그 데이터를 받아서 처리합니다.
	if(isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userPhone']) && isset($_POST['sexRadio']) &&isset($_POST['userName']) && isset($_POST['userNickName'])){

		$userEmail = $_POST['userEmail'];
		$userName = $_POST['userName'];
		$userPassword = $_POST['userPassword'];
		$userPhone = $_POST['userPhone'];
		$userBarcode = null;
		$facebook = 0;
		$userSex = $_POST['sexRadio'];
		$userBirthDay = date('Y-m-d',strtotime($_POST['userBirthDay']));
		$registerDate = date('Y-m-d');
		$userNickName = $_POST['userNickName'];
		$userLevel = 0;

		

		$getUsercount = UserRegister::isUserExistFromRegisterInfo($userEmail);
		echo $getUsercount;
		if($getUsercount === "1"){
			echo "user exist";
		}
		else if($getUsercount === "0"){
			//유저가 없으니 회원으로 가입시킵니다.

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


	//등록된 회원인지 알아보기 위해서 db 접속하여 살펴봅니다. 1이 나오면 등록된 유저, 0이 나오면 등록되지 않은 유저입니다.
	/*$getUsercount = UserRegister::isUserExistFromRegisterInfo($userEmail);

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

	} */
?>
