<?php
	// error_reporting(E_ALL);
	// ini_set("display_errors", 1);
	require_once(__DIR__ . '/../framework/framework.php');
	$pdo = Database::getInstance();
	$pdo->exec(file_get_contents("table.sql"));


	// 운동종류 추가하기
	$exercises = json_decode(file_get_contents("exerciseList.json"), true);
	$i=0;
	foreach ($exercises as $exercise) {
		$stmt = $pdo->prepare("INSERT INTO exerciseList (name, type, date, time, count)
		VALUES (:name, :type, :date, :time, :count)");
		$stmt->execute(array(
			":name"=>$exercise["name"],
			":type"=>$exercise["type"],
			":date"=>date("Y-m-d",mktime(0,0,0,date("m"),date("d")+($i%5),date("Y"))),
			":time"=>$exercise["time"],
			":count"=>$exercise["count"]
		));
		$i++;
	}

	//언제나 gymMember가 member보다 먼저 추가되어야 합니다
	$gymMembers = json_decode(file_get_contents("gymMember.json"), true);
	foreach ($gymMembers as $gymMember) {
		$stmt = $pdo->prepare('INSERT INTO gymMember
			(barcode, name, sex, height, weight, registerDate, duration, branch, active)
		VALUES (:barcode, :name, :sex, :height, :weight, :registerDate, :duration, :branch, :active)');
		$stmt->execute(array(
			":barcode"=>$gymMember["barcode"],
			":name"=>$gymMember["name"],
			":sex"=>$gymMember["sex"],
			":height"=>$gymMember["height"],
			":weight"=>$gymMember["weight"],
			":registerDate"=>$gymMember["registerDate"],
			":duration"=>$gymMember["duration"],
			":branch"=>$gymMember["branch"],
			":active"=>$gymMember["active"]
		));
	}

	$members = json_decode(file_get_contents("member.json"), true);
	foreach ($members as $member) {
		$stmt = $pdo->prepare("INSERT INTO member
			(email, password, name, phone, barcode, birthday, facebook, sex, registerDate, nickname, level)
			VALUES (:email, :password, :name, :phone, :barcode, :birthday, :facebook, :sex, :registerDate, :nickname, :level)");
		$stmt->execute(array(
			':email'=>$member['email'],
			':password'=>sha1($member['password']),
			':name'=>$member['name'],
			':phone'=>$member['phone'],
			':barcode'=>$member['barcode'],
			':birthday'=>$member['birthday'],
			':facebook'=>$member['facebook'],
			':sex'=>$member['sex'],
			':registerDate'=>$member['registerDate'],
			':nickname'=>$member['nickname'],
			':level'=>$member['level']
		));
	}

	// 출석도 만들어봅시다 오늘부터 5일간 모두가 출석해버림 데헷

	// for ($i=0; $i < 5; $i++) {
	// 	$barcodes = array();
	// 	foreach ($members as $member) {
	// 		array_push($barcodes, $member['barcode']);
	// 	}
	// 	foreach ($barcodes as $barcode) {
	// 		$date = date('Y-m-d', strtotime("-".$i."day"));
	// 		$time = mt_rand(0,23).":".mt_rand(0,59).":".mt_rand(0,59);
	// 		$stmt = $pdo->prepare("INSERT INTO attendance(barcode, date)
	// 		VALUES (:barcode, :date)");
	// 		$stmt->execute(array(
	// 			':barcode'=>$barcode,
	// 			':date'=>$date." ".$time
	// 		));
	// 	}
	// }
		// 운동기록 임시로 테이블에 저장해보
	//  $exerciseRecords= json_decode(file_get_contents("exerciseRecord.json"), true);
	 //
	//  foreach ($exerciseRecords as $exerciseRecord) {
	 //
	//  	//echo($exerciseRecord);
	//  	$stmt = $pdo->prepare("INSERT INTO exerciseRecord
	//  		(barcode, exerciseNo, timeRecord, countRecord, date)
	//  		VALUES (:barcode, :exerciseNo, :timeRecord, :countRecord, :date)");
	//  	$stmt->execute(array(
	//  		':barcode'=>$exerciseRecord['barcode'],
	//  		':exerciseNo'=>$exerciseRecord['exerciseNo'],
	 //
	//  		':timeRecord'=>$exerciseRecord['timeRecord'],
	//  		':countRecord'=>$exerciseRecord['countRecord'],
	//  		':date'=>$exerciseRecord['date']
	 //
	//  	));
	//  }
	 //복싱 진도,정보 데이터 입력
	 $boxingList=json_decode(file_get_contents("boxingList.json"), true);

	 foreach($boxingList as $boxingLevel){
	 	$stmt = $pdo->prepare("INSERT INTO boxingList (name, youtubeSrc, description, summary, photo)
	 		VALUES (:name, :youtubeSrc, :description, :summary, :photo)");
	 	$stmt->execute(array(
	 			':name'=>$boxingLevel['name'],
	 			':youtubeSrc'=>$boxingLevel['youtubeSrc'],
	 			':description'=>$boxingLevel['description'],
	 			':summary'=>$boxingLevel['summary'],
	 			':photo'=>$boxingLevel['photo']
	 		));
	 }


	 //복싱 개인별 진도 입력
	 $boxingLevelList=json_decode(file_get_contents("boxingLevel.json"), true);

	 foreach($boxingLevelList as $boxingLevel){
	 	$stmt=$pdo->prepare("INSERT INTO boxingLevel (barcode, no)
	 		VALUES (:barcode, :no)");
	 	$stmt->execute(array(
	 				':barcode'=>$boxingLevel['barcode'],
	 				':no'=>$boxingLevel['no']
	 		));
	 }
?>
<a href="/index.php">gogo</a>
