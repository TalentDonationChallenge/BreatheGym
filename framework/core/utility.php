<?php
	class Utility {
		public static function isLoggedIn() { //로그인 여부
			if (!isset($_SESSION["login"])) {
				return false;
			}
			return true;
		}

		public static function isGymMember() { //다니는회원인가 - 바코드를 리턴 NULL일 경우에는 거짓을 리턴
            $pdo = Database::getInstance();
            $sql = "SELECT barcode FROM member WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':email'=>$_SESSION['email']
            ));
            $member = $stmt->fetch();
            $memberBarcode = $member['barcode'];
            if (is_null($memberBarcode)) {
                return false;
            } else {
                return true;
            }
		}

		public static function isManager() { //관리자인가 - 레벨이 99가 되면 트루를 리턴한다.
            $pdo = Database::getInstance();
            $sql = "SELECT level FROM member WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':email'=>$_SESSION['email']
            ));
            $member = $stmt->fetch();
            $memberLevel = $member['level'];
            if ($memberLevel == 99) {
                return true;
            } else {
                return false;
            }
		}
	}
?>
