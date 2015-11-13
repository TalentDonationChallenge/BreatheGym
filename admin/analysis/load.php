<?php
    require_once(__DIR__.'/../../framework/framework.php');

    $msg = array(
		'status' => 'ok'
	);

    $msg['monthlyJoinedMember']=AdminInformation::monthlyJoinedMemberCount();
    $msg['dailyAttendMemberCount']=AdminInformation::dailyAttendMemberCount();
    $msg['attendTimeStatistics']=AdminInformation::attendTimeStatistics();
    $msg['monthlyGymMemberCount']=AdminInformation::monthlyGymMemberCount();

    header('Content-Type: application/json');
    print(json_encode($msg));

?>
