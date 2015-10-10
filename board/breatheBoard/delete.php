<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('breatheBoard');
    //세션으로 권한 체크 한번 더 해야해요!
    if ($_POST['requestType']==='posting') {

    } else if($_POST['requestType']==='comment'){
        $board->deleteComments($_POST['no']);
    }

?>
