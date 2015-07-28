<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once(__DIR__ . '/../framework/framework.php');


	function getUserDurationDate($barcode){

		$result = array();

		//db에서 회원의 등록일을 가져 옵니다.
		$pdo = Database::getInstance();
		$stmt = $pdo->prepare("SELECT name,registerDate FROM gymMember WHERE barcode = :barcode");
		$stmt -> execute(array(':barcode'=> $barcode));
		$rows = $stmt -> fetch();


		//회원등록일을 변수에 저장
		$username = $rows['name'];
		array_push($result, $username);
		$registerDate = $rows['registerDate'];
		array_push($result, $registerDate);
		
		//echo "등록일 : ".$registerDate.'</br>';
		
		
		//오늘 날짜 구하기
		$today = date('Y-m-d');

		//등록 마감일 구하기
		$nextRegisterDate = strtotime('+1 month',strtotime($registerDate));
		$nextRegisterDate = date('Y-m-d',$nextRegisterDate);
		//array_push($result, $dateminus);
		//echo "마감일: ".$nextRegisterDate.'</br>';

		$stmt = $pdo->prepare("SELECT count(*) FROM attendance WHERE barcode = :username and date >= $registerDate and date <= :today");
		$stmt -> execute(array(
			':username'=> $barcode,
			':today' => $today
			));
		$rows = $stmt -> fetch();
		//실제 출석 횟수
		$attendanceCount = $rows['count(*)'];
		//echo "출석횟수 : ".$attendanceCount."</br>";

		//등록일로부터 지난 날 
		$dateminus = floor((strtotime($today) - strtotime($registerDate))/86400);
		//echo "지난날 : ".$dateminus."</br>";
		//출석률 = (실제 출석 횟수/등록일로부터 지난 날)*100		
		$attendanceRate =  floor(($attendanceCount/$dateminus)*100);
		//echo "출석률 : ".$attendanceRate."</br>";
		array_push($result, $attendanceRate);
		
		//마감일 - 오늘 해서 남은 일수 구하기.
		$dateminus = floor((strtotime($nextRegisterDate) - strtotime($today))/86400);
		//echo "마감 : ".$dateminus."</br>";
		array_push($result, $dateminus);
		//print_r($result);
		return $result;

	}



	

	
	


?>