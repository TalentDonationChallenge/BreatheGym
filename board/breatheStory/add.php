<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('breathestory');
    if ($_POST['requestType']==='posting') {
        $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
    }

?>
