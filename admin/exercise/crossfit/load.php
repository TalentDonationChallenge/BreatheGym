<?php
	require_once (__DIR__.'/../../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		if (!isset($_GET['requestType'])) throw new Exception('not proper request');
		if ($_GET['requestType'] == 'exercises') {
			$msg['exercises'] = AdminExerciseSchedule::loadExercises($_GET['start'], $_GET['end']);
		} else if ($_GET['requestType'] == 'exercise') {
			$msg['exercise'] = AdminExerciseSchedule::loadExercise($_GET['no']);
		}
	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();

		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));
?>
