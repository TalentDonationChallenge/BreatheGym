<?php
	require_once (__DIR__.'/../../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		if (!isset($_POST['no'])) throw new Exception('no request');
		AdminExerciseSchedule::deleteExercise($_POST['no']);

	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();
		
		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));
?>