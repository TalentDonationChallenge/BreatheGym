<?php 

	/**
	* 관리자 운동 스케줄 관리
	*/
	
	class AdminExerciseSchedule {
		public static function insertExercise($name, $type, $value) { //운동 종류 추가할 때
			$pdo = Database::getInstance();
			if ($type===0) { //일정시간동안 세트수
				$stmt = $pdo->prepare('INSERT INTO exerciseList(name, type, time)
					VALUES (:name, :type, :time) ');
				$stmt->execute(array(
					':name'=>$name,
					':type'=>0,
					':time'=>'00:'.$value["minute"].':'.$value["second"]
				));
			} else if($type===1) { //일정세트 하는데 걸린 시간
				$stmt = $pdo->prepare('INSERT INTO exerciseList(name, type, count)
					VALUES (:name, :type, :count) ');
				$stmt->execute(array(
					':name'=>$name,
					':type'=>1,
					':count'=>$count
				));
			} else {
				
			}
			return $pdo->lastInsertId();
		}
		public static function insertSchedule($no, $date) { //운동 스케줄 추가할 때
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('INSERT INTO exerciseSchedule(exerciseNo,date)
				VALUES (:exerciseNo, :date) ');
			$stmt->execute(array(
				':exerciseNo'=>$no,
				':date'=>$date
			));
			return $pdo->lastInsertId();
		}

		public static function loadExercises() {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('SELECT no, name FROM exerciseList ORDER BY no ASC');
			$stmt -> execute();
			$rows = $stmt -> fetchAll();

			$exercises = array();

			foreach ($rows as $row) {
				$exercises[] = array(
					'no' => $row['no'],
					'name' => $row['name']
				);
			}
			return $exercises;
		}
		public static function loadSchedule($start, $end) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('SELECT no, name, date FROM exerciseSchedule JOIN exerciseList 
				ON exerciseList.no = exerciseSchedule.exerciseNo 
				WHERE date>= :start AND date <= :end');
			$stmt->execute(array(
				':start'=>$start,
				':end'=>$end
			));
			$rows = $stmt -> fetchAll();
			$schedules = array();
			foreach ($rows as $row) {
				$schedules[] = array(
					'no' => $row['no'],
					'title' => $row['name'],
					'start' => $row['date']
				);
			}
			return $schedules;
		}

		public static function deleteExercise($no) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('DELETE FROM exerciseList WHERE no = :no');
			$stmt -> execute(array(':no'=>$no));
		}

		public static function deleteSchedule($no, $date) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('DELETE FROM exerciseSchedule WHERE exerciseNo = :no AND date = :date');
			$stmt -> execute(array(
				':no'=>$no,
				':date'=>$date
			));
		}

		public static function editSchedule($no, $originalDate, $date) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('UPDATE exerciseSchedule SET date = :date
				WHERE exerciseNo=:no AND date=:originalDate');
			$stmt->execute(array(
				':no' => $no,
				':originalDate' => $originalDate,
				':date' => $date
			));
		}
	}

?>