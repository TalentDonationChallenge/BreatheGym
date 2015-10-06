<?php
	session_start();
	require_once (__DIR__.'/../common/templete.php');
	require_once(__DIR__.'/core/database.php');
	require_once(__DIR__.'/core/utility.php');
	require_once (__DIR__.'/model/admin/exercise.php');
	require_once (__DIR__.'/model/admin/member.php');
	require_once (__DIR__.'/model/admin/record.php');
	require_once (__DIR__.'/model/admin/information.php');
	require_once (__DIR__.'/model/exercise/user.php');
	require_once (__DIR__.'/model/exercise/boxing.php');
	require_once (__DIR__.'/model/exercise/crossfit.php');
	// require_once (__DIR__.'/model/boxingLecture.php');
	// require_once (__DIR__.'/model/boxingLibrary.php');
	// require_once (__DIR__.'/model/breatheStroy.php');
	require_once (__DIR__.'/model/consulting.php');
	// require_once (__DIR__.'/model/crossfitLibrary.php');
	// require_once (__DIR__.'/model/crossfitLecture.php');
	require_once (__DIR__.'/model/board.php');
	require_once (__DIR__.'/model/imageBoard.php');
	require_once (__DIR__.'/model/memberRegisterFromRegister.php');
	require_once (__DIR__.'/model/visitCountDB.php');
	require_once (__DIR__.'/model/member.php');
	require_once (__DIR__.'/model/attendance.php');


	// require_once (__DIR__.'/model/note.php');
	// require_once (__DIR__.'/model/review.php');
	// require_once (__DIR__.'/model/sparringVideo.php');

	//로그인 했다고 가정하기
	// $_SESSION['login'] = true;
	// $_SESSION['gymMember'] = true;
	// $_SESSION['barcode'] = 'ddu12h3q';
	// $_SESSION['email'] = 'ashd123@dbndf.com';

	//sessionID를 가져와서 방문자데이터를 visitRecord에 저장합니다.
	//session_status()를 통해 session의 존재여부를 확인후 sessionID를 가져와 현재 날짜와 함께 
	//isAlreadyVisit()를 사용하여 오늘 방문했던 적이 있는지를 체크한후
	//방문한 적이 없다면 insertVisitRecord()을 통해 visitRecord에 방문자 session 기록을 저장합니다.
	$status = session_status();
	//echo $status;
	if($status != PHP_SESSION_ACTIVE){
		session_start();
	}

	$_sessionID = session_id();
	$registerDate = date('Y-m-d');
	$isUserAlreadyVisit = VisitCountDB::isAlreadyVisit($_sessionID,$registerDate);
		
	if($isUserAlreadyVisit == 0){
		$insertVisitRecord = VisitCountDB::insertVisitRecord($_sessionID,$registerDate);
	}


?>
