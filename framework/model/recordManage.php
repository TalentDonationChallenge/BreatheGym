<?php
	
	/* 회원 운동기록 관리 */	
	class AdminRecordManage {
		//운동 기록 입력 함수
		public static function insertRecord($barcodes, $exercises, $types, $record, $date) {
			$pdo = Database::getInstance();
			try {
				for($i=0;$i<count($exercises);$i++){
					for($j=0;$j<count($barcodes);$j++){
						if($types[$i]===0){ //입력하는 운동이 횟수기록을 가질 경우
							$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, name, type, timeRecord, countRecord, date)
									VALUES(:barcode, :name, :type, :timeRecord, :countRecord, :date)');
							$stmt->execute(array(
									':barcode'=>$barcodes[$j],
									':name'=>$exercises[$i],
									':type'=>0,
									':timeRecord'=>null,
									':countRecord'=>$record,
									':date'=>$date
							));
						} else if($types[$i]===1) { //입력하는 운동이 시간기록을 가질 경우
							$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, name, type, timeRecord, countRecord, date)
									VALUES(:barcode, :name, :type, :timeRecord :countRecord, :date)');
							$stmt->execute(array(
									':barcode'=>$barcodes[$j],
									':name'=>$exercises[$i],
									':type'=>1,
									':timeRecord'=>$record,
									':countRecord'=>null,
									':date'=>$date
							));
						} else {
							//여기론 오지마
						}
					}
				}
			} catch(Exception $e){

			}
		}
		//현재 출석한 사람들 명단 받아오기
		public static function showMembers(){ 

		}
	}
	
?>