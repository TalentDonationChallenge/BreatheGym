<?php require_once(__DIR__.'/../../framework/framework.php');
    $board = new Consulting();
    $email = $_SESSION['email'];
    $board->insertPost($email, $_POST['title'], $_POST['content']);
    header('Content-Type: application/json');
?>
