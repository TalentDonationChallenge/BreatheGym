<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		if (!isset($_POST['requestType'])) throw new Exception('no request');
		if ($_POST['requestType'] === 'exercise') {
			AdminExerciseSchedule::deleteExercise($_POST['no']);
		} else if ($_POST['requestType'] === 'schedule') {

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