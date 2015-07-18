<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		if (!isset($_GET['requestType'])) throw new Exception('no request');
		if ($_GET['requestType'] === 'exercise') {
			$msg['exercises'] = AdminExerciseSchedule::loadExercise();
		} else if ($_GET['requestType'] === 'schedule') {

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