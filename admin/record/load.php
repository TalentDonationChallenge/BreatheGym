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
		} else if ($_GET['requestType'] === 'member') {
			$msg['members'] = AdminRecordManage::getMembers(date("Y-m-d"),$_GET['exerciseNo'], $_GET['branch']);
		} else {
			new Exception('no request');
		}

	} catch (Exception $exception) {
		$message['status'] = 'error';
		$message['message'] = $exception->getMessage();

		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));

?>
