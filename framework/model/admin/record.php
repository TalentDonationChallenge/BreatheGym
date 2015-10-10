<?php

	/* 회원 운동기록 관리 */
	class AdminRecordManage {
		//운동 기록 입력 함수
		public static function insertRecord($members, $exercise) {
			$pdo = Database::getInstance();
			foreach ($members as $member) {
				$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, exerciseNo, timeRecord, countRecord)
								VALUES(:barcode, :exerciseNo, :timeRecord, :countRecord)');
				if ($exercise['exerciseType'] === '0') {  //입력하는 운동이 횟수기록을 가질 경우
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':exerciseNo'=>$exercise['exerciseNo'],
						':timeRecord'=>"00:00:00",
						':countRecord'=>$member['record']
					));
				} else if($exercise['exerciseType'] === '1') {  //입력하는 운동이 시간기록을 가질 경우
					$time = '00:'.$member['record']['minute'].":".$member['record']['second'];
					$stmt->execute(array(
						':barcode'=>$member['barcode'],
						':exerciseNo'=>$exercise['exerciseNo'],
						':timeRecord'=>$time,
						':countRecord'=>"0"
					));
				} else {
					throw new Exeception('wrong variable');
				}
			}
		}
		//운동 기록 수정 함수
		public static function editRecord($members, $exercise) {
			$pdo = Database::getInstance();
			foreach ($members as $members ) {
				if ($exercise['exerciseType']=== '0') {
					$stmt = $pdo->prepare('UPDATE exerciseRecord
						SET countRecord=:countRecord
						WHERE barcode=:barcode AND exerciseNo=:exerciseNo');
				} else if ($exercise['exerciseType'] === '1') {
					$stmt = $pdo->prepare('UPDATE exerciseRecord
						SET timeRecord=:timeRecord
						WHERE barcode=:barcode AND exerciseNo=:exerciseNo');
				} else {
					throw new Exeception('wrong variable');
				}
			}
		}
		//(오늘 출석한 사람들 - 운동기록 입력된사람들) 명단 받아오기
		public static function getMembers($date, $exercise, $branch){
			$tomorrow = date('Y-m-d',strtotime("+1day ".$date));
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare(
			'SELECT DISTINCT barcode, name, date
    		FROM (gymMember NATURAL JOIN attendance)
    		WHERE date>=:today AND date<:tomorrow
			AND barcode NOT IN (SELECT barcode
                        FROM exerciseRecord NATURAL JOIN exerciseList
                        WHERE date>=:today AND date<:tomorrow AND exerciseNo = :exercise)
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
		//운동기록이 입력된 사람들의 명단과 기록 받아오기
		public static function getFilledMemebers($date, $exercise, $branch) {
			$tomorrow = date('Y-m-d',strtotime("+1day ".$date));
			$pdo=Database::getInstance();
			$stmt=$pdo->prepare('SELECT name, barcode, date, timeRecord, countRecord
				FROM gymMember NATURAL JOIN exerciseRecord NATURAL JOIN attendance
				WHERE date>=:today AND date<:tomorrow
				AND exerciseNo = :exercise AND branch = :branch ORDER BY date DESC');
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
					'date'=> $row['date'],
					'time'=>$row['timeRecord'],
					'count'=>$row['countRecord']
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
