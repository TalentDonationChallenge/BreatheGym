<?php
    require_once(__DIR__.'/../../framework/framework.php');

    $msg = array(
		'status' => 'ok'
	);

    $msg['monthlyJoinedMember']=AdminInformation::monthlyJoinedMemberCount();

    header('Content-Type: application/json');
	print(json_encode($msg));
?>
