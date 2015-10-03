<?php
    require_once(__DIR__.'/../../framework/framework.php');
    $_SESSION = array();
    session_destroy();
    header("Location:/");
?>
