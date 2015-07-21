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
			$stmt = $pdo->prepare('INSERT INTO exerciseSchedule(no,date)
				VALUES (:name, :date) ');
			$stmt->execute(array(
				':name'=>$name,
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
		public static function loadSchedule($month) {
			
		}

		public static function deleteExercise($no) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('DELETE FROM exerciseList WHERE no = :no');
			$stmt -> execute(array(':no'=>$no));
		}

		public static function deleteSchedule($no, $date) {
			
		}
	}

?>