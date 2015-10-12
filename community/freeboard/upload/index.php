<?php
    require(__DIR__.'/../../../framework/core/UploadHandler.php');
    $upload_handler = new UploadHandler(array(
        'download_via_php'=>true,
        'user_dirs'=>true
    ));
?>
