<?php
	/* 회원 복싱 진도 확인*/
	class MemberBoxingManage{
		public static function getBoxingStep($memberName){
			$pdo = Database::getInstance();
			$stmt=$pdo->prepare('SELECT no, name, youtubeSrc, description, summary, photo from boxingLevel join boxingList on boxingLevel.no = boxingList.no where barcode=:member');
			$stmt->execute(array(':member'=>$memberName));
			$result=$stmt->fetchAll();
			$boxingInfo = array();
			foreach($result as $row){
				$boxingInfo[] = array(
					'no' => $row['no'],
					'name' => $row['name'],
					'youtubeSrc' => $row['youtubeSrc'],
					'description' => $row['description'],
					'summary' => $row['summary'],
					'photo' => $row['photo']
				);
			}

			return $boxingInfo;
		}

		public static function boxingStepUp($memberBarcode){
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('UPDATE boxingLevel set no = no+1 where barcode=:barcode');
			$stmt->execute(array(':barcode'=>$memberBarcode));
		}

		public static function boxingStepDown($memberBarcode){
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('UPDATE boxingLevel set no = no-1 where barcode=:barcode');
			$stmt->execute(array(':barcode'=>$memberBarcode));
		}

	}
?>