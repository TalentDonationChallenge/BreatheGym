<?php
    require_once(__DIR__.'/../../framework/framework.php');

    $msg = array(
		'status' => 'ok'
	);

    $msg['monthlyJoinedMember']=AdminInformation::monthlyJoinedMemberCount();
    $msg['dailyAttendMemberCount']=AdminInformation::dailyAttendMemberCount();
    $msg['attendTimeStatistics']=AdminInformation::attendTimeStatistics();
    $msg['monthlyGymMemberCount']=AdminInformation::monthlyGymMemberCount();
    $msg['endedMembers']=AdminInformation::endedMembers();


    header('Content-Type: application/json');
?>
