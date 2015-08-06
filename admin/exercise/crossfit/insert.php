<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		// if (!Utility::isManager()) throw new Exception('no previlege'); // 관리자 권한 있는지 확인
		if (!isset($_POST['requestType'])) throw new Exception('no request');
		if ($_POST['requestType'] === 'exercise') {
			if ($_POST['type'] === 'time') {
				$no = AdminExerciseSchedule::insertExercise($_POST['name'], 0, 
					array('minute'=>$_POST['minute'], 'second'=>$_POST['second']));
				$msg['no'] = $no;
			} else if ($_POST['type'] ==='count') {
				$no = AdminExerciseSchedule::insertExercise($_POST['name'], 1, $_GET['count']);
				$msg['no'] = $no;
			} else {
				new Exception('not proper request');
			}
		} else if ($_POST['requestType'] === 'schedule') {
			AdminExerciseSchedule::insertSchedule($_POST['no'],$_POST['date']);
		} else {
			new Exception('not proper request');
		}

	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();
		
		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));
?>