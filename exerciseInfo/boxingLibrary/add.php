<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new ImageBoard('boxingLib');
    if ($_POST['requestType']==='posting') {
        if(!isset($_POST['files'])&&!isset($_POST['youtube'])) {
            //이미지와 동영상이 없을 때
            $id = $board->insertPost($_SESSION['email'], $_POST['title'], $_POST['content']);
        } else {
            $imageFlag = isset($_POST['files'])?1:0;
            $videoFlag = !empty($_POST['youtube'])?1:0;
            $id = $board->insertImagePost($_SESSION['email'], $_POST['title'], $_POST['content'], $imageFlag, $videoFlag);
            if($imageFlag) {
                $files = $_POST['files'];
                foreach ($files as $file) {
                    $board->addImage($file['saved'], $file['filename'], $id);
                }
            }
            if($videoFlag) {
                $board->insertVideo($_POST['youtube'], $id);
            }
        }
    } else if($_POST['requestType']==='comment'){
        $id = $board->submitComments($_SESSION['email'], $_POST['content'], $_POST['postNumber']);
    }
    $msg['no'] = $id;
    header('Content-Type: application/json');
	print(json_encode($msg));
?>
