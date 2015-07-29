<?php
	
	/* 회원 운동기록 관리 */	
	class AdminRecordManage {
		//운동 기록 입력 함수
		public static function insertRecord($members, $exercise, $date) {
			$pdo = Database::getInstance();
			foreach ($members as $member) {
				$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, exerciseNo, timeRecord, countRecord, date)
								VALUES(:barcode, :exerciseNo, :timeRecord, :countRecord, :dates)');
				if ($exercise['exerciseType'] === '0') {  //입력하는 운동이 횟수기록을 가질 경우
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':exerciseNo'=>$exercise['exerciseNo'],
						':timeRecord'=>null,
						':countRecord'=>$member['record'],
						':dates'=>$date
					));
				} else if($exercise['exerciseType'] === '1') {  //입력하는 운동이 시간기록을 가질 경우
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':exerciseNo'=>$exercise['exerciseNo'],
						':timeRecord'=>'00:'.$member['record']['minute'].":".$member['record']['second'],
						':countRecord'=>null,
						':dates'=>$date
					));
				} else {
					new Exeception('wrong variable');
				}
			}
		}
		//(오늘 출석한 사람들 - 운동기록 입력된사람들) 명단 받아오기
		public static function getMembers($date, $exercise){
			$tomorrow = date('Y-m-d',strtotime("+1day ".$date));
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('SELECT gymMember.name as name, gymMember.barcode as barcode, A.date as date
				FROM(SELECT attendance.barcode, exerciseNo, attendance.date FROM attendance LEFT JOIN 
					(SELECT * FROM exerciseRecord WHERE exerciseNo = :exercise) AS record
				ON attendance.barcode = record.barcode
				WHERE attendance.date >= :today AND attendance.date < :tomorrow 
				AND exerciseNo IS NULL) as A
				JOIN gymMember ON A.barcode = gymMember.barcode ORDER BY A.date ASC');
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
					'date'=> $row['date']
				);
			}
			return $members;
		}
		//오늘 예정된 운동 종류 받아오기
		public static function getExercises($date){
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('SELECT name, type, no
				from exerciseSchedule as a join exerciseList as b 
				on a.exerciseNo=b.no where date=:date');
			$stmt->execute(array(':date'=>$date));
			$result=$stmt->fetchAll();
			$exercises = array();
			foreach ($result as $row){
				$exercises[] = array(
					'no' => $row['no'],
					'name' => $row['name'],
					'type' => $row['type']
				);
			}
			
			return $exercises;
		}
	}
	
?>