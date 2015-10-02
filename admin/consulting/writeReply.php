<?php
    require_once(__DIR__.'/../../framework/framework.php');
    if(!isset($_POST['origin'])||!isset($_POST['content'])){
        //에러처리
    }
    $consulting = new Consulting();
    $consulting->insertReply($_POST['origin'], $_POST['content']);
?>
