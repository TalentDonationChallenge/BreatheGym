<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('sparring');
    if ($_POST['requestType']==='posting') {
        $videoFlag = !empty($_POST['youtube'])?1:0;
        $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
        if($videoFlag) {
            $board->insertVideo($_POST['youtube'], $id);
        }
    }

?>
