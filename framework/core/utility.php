<?php
	class Utility {
		public static function isLoggedIn() { //로그인 여부
			if (!isset($_SESSION["login"])) {
				return false;
			}
			return true;
		}

		public static function isGymMember() { //다니는회원인가 - 바코드를 리턴

		}

		public static function isManager() { //관리자인가

		}
	}
?>
