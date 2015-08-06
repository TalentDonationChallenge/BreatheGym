<?php

	/**
	* 관리자 운동 스케줄 관리
	*/

	class AdminExerciseSchedule {
		public static function insertExercise($name, $type, $value, $date, $memo) { //운동 종류 추가할 때
			$pdo = Database::getInstance();
			if ($type===0) { //일정시간동안 세트수
				$stmt = $pdo->prepare('INSERT INTO exerciseList(name, date, type, time, memo)
					VALUES (:name, :date, :type, :time, :memo)');
				$stmt->execute(array(
					':name'=>$name,
					':date'=>$date,
					':type'=>0,
					':time'=>$value,
					':memo'=>$memo
				));
			} else if($type===1) { //일정세트 하는데 걸린 시간
				$stmt = $pdo->prepare('INSERT INTO exerciseList(name, date, type, count, memo)
					VALUES (:name, :date, :type, :count, :memo)');
				$stmt->execute(array(
					':name'=>$name,
					':date'=>$date,
					':type'=>1,
					':count'=>$value,
					':memo'=>$memo
				));
			} else {
				return new Exception();
			}
			return $pdo->lastInsertId();
		}

		public static function loadExercises($start, $end) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('SELECT no, name, date FROM exerciseList
				WHERE date>=:start AND date<=:end');
			$stmt -> execute(array(
				':start'=>$start,
				':end'=>$end
			));
			$rows = $stmt -> fetchAll();
			$exercises = array();
			foreach ($rows as $row) {
				$exercises[] = array(
					'no' => $row['no'],
					'title' => $row['name'],
					'start' => $row['date']
				);
			}
			return $exercises;
		}
		public static function loadExercise($no) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare('SELECT name,type,time,count,memo FROM exerciseList
				WHERE no=:no');
			$stmt -> execute(array(
				':no'=>$no
			));

			$row = $stmt -> fetch();
			$exercise = array(
				'name' => $row['name'],
				'type' => $row['type'],
				'time' => $row['time'],
				'count' => $row['count'],
				'memo' => $row['memo']
			);
			return $exercise;
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
