<?php
	require_once (__DIR__.'/../../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);
// ***메모에서 공격 들어올 수 있으므로 추후 수정해야함 ***
	try {
		// if (!Utility::isManager()) throw new Exception('no previlege'); // 관리자 권한 있는지 확인
		if (!(isset($_POST['name'])&&isset($_POST['type'])&&isset($_POST['date']))) throw new Exception('not proper request') ;
		$memo = (!isset($_POST['memo'])) ? '' : $_POST['memo'] ;
		if ($_POST['type'] === 'time') {
			if(!isset($_POST['minute'])&&!isset($_POST['second'])) throw new Exception('not proper request') ;
			$minute = (!isset($_POST['minute'])) ? '00' : $_POST['minute'] ;
			$second = (!isset($_POST['second'])) ? '00' : $_POST['second'] ;
			$time = '00:'.$minute.':'.$second;
			$no = AdminExerciseSchedule::insertExercise($_POST['name'], 0,
				$time,$_POST['date'],$memo);
			$msg['no'] = $no;
		} else if ($_POST['type'] ==='count') {
			if(!isset($_POST['count'])) throw new Exception('not proper request') ;
			$no = AdminExerciseSchedule::insertExercise($_POST['name'], 1,
				$_POST['count'],$_POST['date'],$memo);
			$msg['no'] = $no;
		} else {
			throw new Exception('not proper request');
		}
	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();

		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));
?>
