<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('freeboard');
    if ($_POST['requestType']==='posting') {
        $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
    } else if($_POST['requestType']==='comment'){
        $board->submitComments($_SESSION['email'], $_POST['content'], $_POST['postNumber']);
    }

?>
