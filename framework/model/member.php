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
            if ($password === $memberPassword) {
                return true;
            } else {
                return false;
            }
        }
        public static function edit() { // 회원정보 수정

        }
        public static function delete($email) { // 탈퇴

        }

    }

?>
