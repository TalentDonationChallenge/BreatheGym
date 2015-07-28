<?php
	
	/* 회원 운동기록 관리 */	
	class AdminRecordManage {
		//운동 기록 입력 함수
		public static function insertRecord($members, $exercise, $date) {
			$pdo = Database::getInstance();
			foreach ($members as $member) {
				$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, name, type, timeRecord, countRecord, date)
								VALUES(:barcode, :name, :type, :timeRecord, :countRecord, :dates)');
				if ($exercise['type'] === 0) {  //입력하는 운동이 횟수기록을 가질 경우
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':name'=>$exercise['name'],
						':type'=>0,
						':timeRecord'=>null,
						':countRecord'=>$member['record'],//기록은 중첩어레이로 받습니다. [사람][운동]
						':dates'=>$date
					));
				} else if($exercise['type'] === 1) {  //입력하는 운동이 시간기록을 가질 경우
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':name'=>$exercise['name'],
						':type'=>1,
						':timeRecord'=>'00:'.$member['record']['minute'].":".$member['record']['second'],
						':countRecord'=>null,
						':dates'=>$date
					));
				} else {
					//여기론 오지마
				}
			}
		}
		//(오늘 출석한 사람들 - 운동기록 입력된사람들) 명단 받아오기
		public static function getMembers($date, $exercise){
			$tomorrow = date('Y-m-d',strtotime("+1day ".$date));
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('SELECT gymMember.name, gymMember.barcode
				FROM(SELECT attendance.barcode, exerciseNo FROM attendance LEFT JOIN exerciseRecord
				ON attendance.barcode = exerciseRecord.barcode
				WHERE attendance.date >= :today AND attendance.date < :tomorrow 
				AND (exerciseNo is null or exerciseNo != :exercise)) as A
				JOIN gymMember ON A.barcode = gymMember.barcode');
			$stmt->execute(array(
				':today'=>$date, 
				':tomorrow'=>$tomorrow,
				':exercise'=>$exercise
			));
			$result=$stmt->fetchAll();

			$members = array();
			foreach ($result as $row) {
				$members[] = array(
					'name' => $row['name'],
					'barcode' => $row['barcode'],
				);
			}
			return $members;
		}
		//오늘 예정된 운동 종류 받아오기
		public static function getExercises($date){
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('SELECT name, type from exerciseSchedule as a join exerciseList as b on a.exerciseNo=b.no where date=:date');
			$stmt->execute(array(':date'=>$date));
			$result=$stmt->fetchAll();
			$exercises = array();
			foreach ($result as $row){
				$exercises[] = array(
					'name' => $row['name'],
					'type' => $row['type']
				);
			}
			
			return $result;
		}
	}
	
?>