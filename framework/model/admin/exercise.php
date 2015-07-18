<?php 

	/**
	* 관리자 운동 스케줄 관리
	*/
	class AdminExerciseSchedule {
		public static function insertExcercise($name, $type,$value) { //운동 종류 추가할 때
			$pdo = Database::getInstace();

			try {
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
			} catch (Exception $e) {
				
			}
		}
		public static function insertSchedule() { //운동 스케줄 추가할 때
			
		}

		public static function loadExercises() {
			$pdo = Database::getInstance();

			try {
				// $stmt = $pdo->prepare('SELECT ')
			}
		}
	}

?>