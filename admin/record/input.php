<?php
	require_once (__DIR__.'/../../framework/framework.php');

	$msg = array(
		'status' => 'ok'
	);

	try {
		// if (!Utility::isManager()) throw new Exception('no previlege'); // 관리자 권한 있는지 확인
		// print_r($_POST['members']);
		// print_r($_POST['exerciseNo']);
		AdminRecordManage::insertRecord($_POST['members'],$_POST['exercise'],date('Y-m-d'));
		
	} catch (Exception $exception) {
		$msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();
		
		header("HTTP/1.1 410 Gone");
	}

	header('Content-Type: application/json');
	print(json_encode($msg));
?>