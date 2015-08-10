<?php

	/* 회원 운동기록 관리 */
	class AdminRecordManage {
		// //운동 기록 입력 함수
		// public static function insertRecord($members, $exercise, $date) {
		// 	$pdo = Database::getInstance();
		// 	foreach ($members as $member) {
		// 		$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, exerciseNo, timeRecord, countRecord, date)
		// 						VALUES(:barcode, :exerciseNo, :timeRecord, :countRecord, :dates)');
		// 		if ($exercise['exerciseType'] === '0') {  //입력하는 운동이 횟수기록을 가질 경우
		// 			$stmt->execute(array(
		// 				':barcode'=>$member['barcode'],
		// 				':exerciseNo'=>$exercise['exerciseNo'],
		// 				':timeRecord'=>null,
		// 				':countRecord'=>$member['record'],
		// 				':dates'=>$date
		// 			));
		// 		} else if($exercise['exerciseType'] === '1') {  //입력하는 운동이 시간기록을 가질 경우
		// 			$stmt->execute(array(
		// 				':barcode'=>$member['barcode'],
		// 				':exerciseNo'=>$exercise['exerciseNo'],
		// 				':timeRecord'=>'00:'.$member['record']['minute'].":".$member['record']['second'],
		// 				':countRecord'=>null,
		// 				':dates'=>$date
		// 			));
		// 		} else {
		// 			new Exeception('wrong variable');
		// 		}
		// 	}
		// }
		//(오늘 출석한 사람들 - 운동기록 입력된사람들) 명단 받아오기
		public static function getMembers($date, $exercise,$branch){
			$tomorrow = date('Y-m-d',strtotime("+1day ".$date));
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare(
			'SELECT DISTINCT attendance.barcode as barcode, name, date
			FROM (gymMember NATURAL JOIN attendance) LEFT JOIN exerciseRecord
			ON attendance.barcode = exerciseRecord.barcode
			WHERE date>=:today AND date<:tomorrow
			AND (exerciseNo IS NULL OR exerciseNo != :exercise)
			AND branch = :branch ORDER BY date DESC');
			$stmt->execute(array(
				':today'=>$date,
				':tomorrow'=>$tomorrow,
				':exercise'=>$exercise,
				':branch'=>$branch
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
				from exerciseList where date=:date');
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
