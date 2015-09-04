<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		if (!isset($_GET['requestType'])) throw new Exception('no request');
		if ($_GET['requestType'] === 'exercise') {
			// 오늘의 운동종류... 추후 다른 날짜를 보여줄 수 있도록 발전시키는 것이 좋지 않을까
			$msg['exercises'] = AdminRecordManage::getExercises(date("Y-m-d"));
		} else if ($_GET['requestType'] === 'ranking') {
			$exercise = array('no'=>$_GET['exerciseNo'],'type'=>$_GET['type']);
			$msg['rankers'] = MemberCrossfitManagement::getCrossfitRankers($exercise);
		} else if ($_GET['requestType'] === 'userRecord') {

		} else {
			new Exception('no request');
		}

	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();

		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));

?>
