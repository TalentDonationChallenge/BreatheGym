<?php
    require_once(__DIR__.'/../../framework/framework.php');
	$msg = array(
		'status' => 'ok'
	);
    try {
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(Member::signIn($email, $password)){
                // 로그인성공
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['barcode'] = Utility::isGymMember();
                $msg['login'] = 'success';
                $msg['email'] = $email;
            } else {
                // 실패
                $msg['login'] = 'fail';
            }
        }
    } catch(Exception $ex) {
        $msg['status'] = 'error';
		$msg['message'] = $exception->getMessage();
		header("HTTP/1.1 410 Gone");
    }
    header('Content-Type: application/json');
	print(json_encode($msg));
?>
