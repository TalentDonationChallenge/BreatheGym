<?php
	/* 회원 복싱 진도 확인*/
	class MemberBoxingManage{
		public static function getBoxingInfo($no){
			$pdo = Database::getInstance();
			$stmt=$pdo->prepare('SELECT no, name, youtubeSrc, description, summary, photo
				FROM boxingList WHERE no=:no');
			$stmt->execute(array(':no'=>$no));
			$result=$stmt->fetch();
			$boxingInfo = array(
				'no'=>$result['no'],
				'name'=>$result['name'],
				'youtubeSrc'=>$result['youtubeSrc'],
				'description'=>$result['description'],
				'summary'=>$result['summary'],
				'photo'=>$result['photo']
			);
			return $boxingInfo;
		}

        public static function getBoxingProgress($barcode) {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT no, name FROM boxingLevel NATURAL JOIN boxingList
                WHERE barcode=:barcode");
            $stmt -> execute(array(':barcode'=> $barcode));
    		$row = $stmt -> fetch();
            $progress = array(
                'no'=>$row['no'],
                'name'=>$row['name']
            );
            return $progress;
        }
        public static function getBoxingProgressList($no) {
            $colors = array('success','info','primary','warning','danger');
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT name FROM boxingList
            WHERE no <= :no ORDER BY no ASC LIMIT 5");
            $stmt -> execute(array(':no'=>$no));
            $rows = $stmt -> fetchAll();
            $progressList = array();
            $i = 0;
            foreach ($rows as $row) {
                $progressList[] = array(
                    'name'=>$row['name'],
                    'color'=>$colors[$i]
                );
                $i++;
            }
            return $progressList;
        }
		// public static function boxingStepUp($memberBarcode){
		// 	$pdo=Database::getInstance();
		// 	$stmt=$pdo->prepare('UPDATE boxingLevel set no = no+1 where barcode=:barcode');
		// 	$stmt->execute(array(':barcode'=>$memberBarcode));
		// }
		//
		// public static function boxingStepDown($memberBarcode){
		// 	$pdo=Database::getInstance();
		// 	$stmt=$pdo->prepare('UPDATE boxingLevel set no = no-1 where barcode=:barcode');
		// 	$stmt->execute(array(':barcode'=>$memberBarcode));
		// }

	}
?>
