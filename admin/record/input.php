<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		// if (!Utility::isManager()) throw new Exception('no previlege'); // 관리자 권한 있는지 확인
		
		var_dump($json);
		if ($_POST['type'] === 'time') {
			$no = AdminRecordManage::insertRecord($_POST['name'], 0,
				array('minute'=>$_POST['minute'], 'second'=>$_POST['second']));
			$msg['no'] = $no;
		} else if ($_POST['type'] ==='count') {
			$no = AdminRecordManage::insertRe ord($_POST['name'], 1, $_GET['count']);
			$msg['no'] = $no;
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