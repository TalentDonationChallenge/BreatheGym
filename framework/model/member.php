<?php
    /**
     * 회원이 할 수 있는 일들
     */
    class Member {
        public static function signIn($email, $password) { //로그인 성공하면 true, 실패하면 false
            $pdo = Database::getInstance();
            $sql = "SELECT password FROM member WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':email'=>$email
            ));
            $member = $stmt->fetch();
            $memberPassword = $member['password'];
            if (sha1($password) === $memberPassword) {
                return true;
            } else {
                return false;
            }
        }
        public static function edit($input) { // 회원정보 수정 - (이름, 생일, 성별)은 불변의 값이고 만약 수정하면 관리자가 수정
            // 페이스북은 가입할떄 했으니까 안하고, (바코드, 등록일, 레벨)은 관리자가 관리해야하는값이니까 수정안하고 남은 비밀번호와 전화번호, 별명 변경 가능
            $email = $_SESSION['email']; // 이메일은 세션에 있는 이메일을 불러온다
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("UPDATE member SET
                password = :password,
                phone = :phone,
                nickname = :nickname
                WHERE email = $email");
            $stmt->execute(array(
                ':password'=>sha1($input[0]),
                ':phone'=>$input[1],
                ':nickname'=>$input[2]
            ));
        }

        public static function loadInfo() {
            $pdo = Database::getInstance();
            $sql = "SELECT name, sex, nickname, phone, birthday FROM member WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':email'=>$_SESSION['email']
            ));
            $row = $stmt->fetch();
            return $row;
        }

        public static function delete($email) { // 탈퇴
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("DELETE FROM member WHERE email = :email");
            $stmt->execute(array(':email' => $_SESSION['email']));
        }

    }

?>
