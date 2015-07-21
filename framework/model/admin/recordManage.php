<?php
	
	/* 회원 운동기록 관리 */	
	class AdminRecordManage {
		//운동 기록 입력 함수
		public static function insertRecord($barcodes, $exercises, $types, $records, $date) {
			try {
				$pdo = Database::getInstance();
				for($i=0;$i<count($exercises);$i++){
					for($j=0;$j<count($barcodes);$j++){
						if($types[$i]===0){ //입력하는 운동이 횟수기록을 가질 경우
							$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, name, type, timeRecord, countRecord, date)
									VALUES(:barcode, :name, :type, :timeRecord, :countRecord, :dates)');
							$stmt->execute(array(
										':barcode'=>$barcodes[$j],
										':name'=>$exercises[$i],
										':type'=>0,
										':timeRecord'=>null,
										':countRecord'=>$records[$j][$i],//기록은 중첩어레이로 받습니다. [사람][운동]
										':dates'=>$date
							));
						} else if($types[$i]===1) { //입력하는 운동이 시간기록을 가질 경우
							$stmt = $pdo->prepare('INSERT INTO exerciseRecord(barcode, name, type, timeRecord, countRecord, date)
									VALUES(:barcode, :name, :type, :timeRecord, :countRecord, :dates)');
							$stmt->execute(array(
									':barcode'=>$barcodes[$j],
									':name'=>$exercises[$i],
									':type'=>1,
									':timeRecord'=>$records[$j][$i],
									':countRecord'=>null,
									':dates'=>$date
							));
						} else {
							//여기론 오지마
						}
						
					}
				}
			} catch(Exception $e){
				
			}
		}
		//오늘 출석한 사람들 명단 받아오기
		public static function getTodayMembers(){
			try{
				$pdo=Database::getInstance();

				$stmt=$pdo->prepare('SELECT name, date from attendance join gymMember where attendance.date = CURDATE()');
				$stmt->execute();
				$result=$stmt->fetchAll();
				$members = array();
				foreach ($result as $row) {
					$members[] = array(
						'name' => $row['name'],
						'date' => $row['date']
					);
				}
				
				return $members;
			} catch(PDOException $e){
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
		}
		//오늘 예정된 운동 종류 받아오기
		public static function getTodayExercises(){
			try{
				$pdo=Database::getInstance();
				$stmt=$pdo->prepare('SELECT name, type from exerciseSchedule as a join exerciseList as b on a.exerciseNo=b.no where date=CURDATE()');
				$stmt->execute();
				$result=$stmt->fetchAll();
				$exercises = array();
				foreach ($result as $row){
					$exercises[] = array(
						'name' => $row['name'],
						'type' => $row['type']
					);
				}
				
				return $result;
			} catch(PDOException $e){
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
		}
	}
	
?>