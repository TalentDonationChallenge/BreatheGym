<?php
	session_start();
	require_once (__DIR__.'/../common/templete.php');
	require_once(__DIR__.'/core/database.php');
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
	// require_once (__DIR__.'/model/member.php');
	// require_once (__DIR__.'/model/note.php');
	// require_once (__DIR__.'/model/review.php');
	// require_once (__DIR__.'/model/sparringVideo.php');

	//로그인 했다고 가정하기
	$_SESSION['login'] = true;
	$_SESSION['gymMember'] = true;
	$_SESSION['barcode'] = 'ddu12h3q';
	$_SESSION['email'] = 'ashd123@dbndf.com';
?>
