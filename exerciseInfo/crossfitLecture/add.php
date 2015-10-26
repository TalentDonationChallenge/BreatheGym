<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('crossfitLec');
    if ($_POST['requestType']==='posting') {
        if(!isset($_POST['files'])) {
            //이미지가 없을 때
            $id = $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
        } else {
            //이미지가 있을 때
            $id = $board->insertImagePost($_SESSION['email'], $_POST['title'], $_POST['content']);
            $files = $_POST['files'];
            foreach ($files as $file) {
                $board->addImage($file['saved'], $file['filename'], $id);
            }
        }
        $msg['no'] = $id;
    } else if($_POST['requestType']==='comment'){
        $board->submitComments($_SESSION['email'], $_POST['content'], $_POST['postNumber']);
    }
    header('Content-Type: application/json');
	print(json_encode($msg));
?>
