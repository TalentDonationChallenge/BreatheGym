<?php
    require_once(__DIR__.'/../../framework/framework.php');
    if(isset($_POST['email'])&&isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(Member::signIn($email, $password)){
            // 로그인성공
            $_SESSION['login'] = true;
        	$_SESSION['email'] = $email;
            $_SESSION['barcode'] = Utility::isGymMember(); 
        }

    }
?>
