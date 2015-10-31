<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('breatheBoard');
    if ($_POST['requestType']==='posting') {
        $id = $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
        $files = $_POST['files'];
        foreach ($files as $file) {
            $board->addImage($file['saved'], $file['filename'], $id);
        }
    } else if($_POST['requestType']==='comment'){
        $id = $board->submitComments($_SESSION['email'], $_POST['content'], $_POST['postNumber']);
    }
    $msg['no'] = $id;
    header('Content-Type: application/json');
	print(json_encode($msg));
?>
