<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once(__DIR__ . '/../framework/framework.php');


	function getUserDurationDate($barcode){

		$result = array();

		//db에서 회원의 등록일을 가져 옵니다.
		$pdo = Database::getInstance();
		$stmt = $pdo->prepare("SELECT name,registerDate FROM gymMember WHERE barcode = :barcode");
		$stmt -> execute(array(':barcode'=> $barcode));
		$rows = $stmt -> fetch();


		//회원등록일을 변수에 저장
		$username = $rows['name'];
		array_push($result, $username);
		$registerDate = $rows['registerDate'];
		array_push($result, $registerDate);
		
		//echo "등록일 : ".$registerDate.'</br>';
		
		
		//오늘 날짜 구하기
		$today = date('Y-m-d');

		//등록 마감일 구하기
		$nextRegisterDate = strtotime('+1 month',strtotime($registerDate));
		$nextRegisterDate = date('Y-m-d',$nextRegisterDate);
		//array_push($result, $dateminus);
		//echo "마감일: ".$nextRegisterDate.'</br>';

		$stmt = $pdo->prepare("SELECT count(*) FROM attendance WHERE barcode = :username and date >= $registerDate and date <= :today");
		$stmt -> execute(array(
			':username'=> $barcode,
			':today' => $today
			));
		$rows = $stmt -> fetch();
		//실제 출석 횟수
		$attendanceCount = $rows['count(*)'];
		//echo "출석횟수 : ".$attendanceCount."</br>";

		//등록일로부터 지난 날 
		$dateminus = floor((strtotime($today) - strtotime($registerDate))/86400);
		//echo "지난날 : ".$dateminus."</br>";
		//출석률 = (실제 출석 횟수/등록일로부터 지난 날)*100		
		$attendanceRate =  floor(($attendanceCount/$dateminus)*100);
		//echo "출석률 : ".$attendanceRate."</br>";
		array_push($result, $attendanceRate);
		
		//마감일 - 오늘 해서 남은 일수 구하기.
		$dateminus = floor((strtotime($nextRegisterDate) - strtotime($today))/86400);
		//echo "마감 : ".$dateminus."</br>";
		array_push($result, $dateminus);
		//print_r($result);
		return $result;

	}

	function getUserExerciseRecord($barcode){

		$today = date('Y-m-d');
		//printf("오늘 날짜 : ".$today."</br>");
		$beforedate = strtotime('-1 day',strtotime($today));
		$beforedate = date('Y-m-d',$beforedate );
		
		$result = array();
		$pdo = Database::getInstance();

		$tmpsavedexerciseName = array();
		//오늘 운동했던 운동 종목 이름을 가져옵니다.
		$stmt = $pdo->prepare("SELECT distinct(name) 
			FROM ExerciseRecord as er NATURAL JOIN exerciseList as el 
			WHERE er.exerciseNo = el.no and date >= :beforedate and date <= :today 
			ORDER by er.exerciseNo ASC");
		$stmt -> execute(array(
			':beforedate' => $beforedate,	
			':today' => $today
		));
		$rows = $stmt -> fetchAll();

		
		foreach ($rows as $row) {
			
			array_push($tmpsavedexerciseName, $row['name']);
		}
		//echo "오늘한 운동의 종류 ";
		//print_r($tmpsavedexerciseName);
		//echo "<br>";

		//오늘 운동한 총원수를 계산합니다.
		$stmt = $pdo->prepare("SELECT COUNT(DISTINCT(barcode)) 
			FROM exerciseRecord 
			WHERE date >= :beforedate and date <= :today");
		$stmt -> execute(array(
			':beforedate' => $beforedate,	
			':today' => $today
		));
		$rows = $stmt -> fetchAll();
		//오늘 운동한 총 회원수를 변수에 저장합니다.
		$totalTodayGymMember = $rows[0]['COUNT(DISTINCT(barcode))'];
		//echo("오늘 운동한 회원 수 : ".$totalTodayGymMember);
		//echo"</br>";
		//echo("</br>");
		
		//각 종목당 내 위에 몇명이 있는지 알아야겠죠?
		//일단 내 기록부터 먼저 가지고 옵시다.
		$stmt = $pdo->prepare("SELECT *
			FROM ExerciseRecord as er NATURAL JOIN exerciseList as el
			WHERE er.exerciseNo = el.no and barcode = :barcode and date >= :beforedate and date <= :today
			ORDER by er.exerciseNo ASC");
		$stmt -> execute(array(
			':barcode'=> $barcode,
			':beforedate' => $beforedate,	
			':today' => $today
		));
		$rows = $stmt -> fetchAll();
		foreach ($rows as $row) {
			//echo("내 기록 : ");
			//print_r($row);
			//echo("</br>");
			//echo("</br>");
		}

		//이제 내 위에 몇명 있는지 봅시다.
		$tmp = array();
		$count = 0;
		foreach ($rows as $row) {
			
			//echo($count);
			if($row['type'] == 0){
				$stmt = $pdo->prepare("SELECT count(*),el.name 
					FROM ExerciseRecord  as er NATURAL JOIN exerciseList as el
					WHERE er.exerciseNo = el.no and name = :name and countRecord > :countRecord and date >= :beforedate and date <= :today");
				$stmt -> execute(array(
					':name'=> $row['name'],
					':countRecord' => $row['countRecord'],
					':beforedate' => $beforedate,	
					':today' => $today
					
					));

				$rows = $stmt -> fetchAll();

				//echo("type = 0 : ");
				//print_r($rows);
				//echo("</br>");
				//echo("</br>");
				foreach ($rows as $row) {
					$tmp2array = array("name"=>$row['name'],"count"=>$row['count(*)']);
					
					
				}
			}
			else{
				$stmt = $pdo->prepare("SELECT count(*),el.name 
					FROM ExerciseRecord as er NATURAL JOIN exerciseList as el
					WHERE er.exerciseNo = el.no and name = :name and timeRecord < :timeRecord and date >= :beforedate and date <= :today");
				$stmt -> execute(array(
					':name'=> $row['name'],
					':timeRecord' => $row['timeRecord'],
					':beforedate' => $beforedate,	
					':today' => $today
					
					));

				$rows = $stmt -> fetchAll();
				//echo("type = 1 : ");
				//print_r($rows);
				//echo("</br>");
				//echo("</br>");
				foreach ($rows as $row) {
					$tmp2array = array("name"=>$row['name'],"count"=>$row['count(*)']);
					
					
				}


			}
			$tmp = array_push_assoc($tmp,$count,$tmp2array);
			$count++;
		
		}
		
		//자 이제 $tmp변수에서 종목당 내 상위에 몇명이 있는지 알 수 있습니다.
		//여기에 종목과 퍼센트를 구해서 넘겨주겠습니다.
		$userRanking = array();
		$count = 0;
		foreach ($tmp as $eachname) {
			$ranking = (($eachname['count']+1)/$totalTodayGymMember)*100;
			$tmparray = array("name"=>$eachname['name'],"ranking"=>$ranking);
			$userRanking = array_push_assoc($userRanking,$count,$tmparray);
			$count ++;
			
		}

		
		//print_r($userRanking);
		return $userRanking;

	}


	function BreathRanking(){
		$today = date('Y-m-d');
		//printf("오늘 날짜 : ".$today."</br>");
		$beforedate = strtotime('-1 day',strtotime($today));
		$beforedate = date('Y-m-d',$beforedate );
		
		$result = array();
		$pdo = Database::getInstance();

		$tmpsavedexerciseName = array();
		//오늘 운동했던 운동 종목 이름을 가져옵니다.
		$stmt = $pdo->prepare("SELECT distinct(name),type
			FROM ExerciseRecord as er NATURAL JOIN exerciseList as el 
			WHERE er.exerciseNo = el.no and date >= :beforedate and date <= :today 
			ORDER by er.exerciseNo ASC");
		$stmt -> execute(array(
			':beforedate' => $beforedate,	
			':today' => $today
		));
		$rows = $stmt -> fetchAll();
		//echo "오늘한 운동의 종류 ";
		//print_r($rows);
		//echo "<br>";
		$totalBreathRanking = array();
		$totalcount = 0;
		foreach ($rows as $row) {
			$breathRankingForEachList = array();
			$count = 0;
			if($row['type'] == 0){
					//printf($row['name']);
					$stmt = $pdo->prepare("SELECT countRecord , el.name as list ,gm.name as member
						FROM ExerciseRecord as er JOIN exerciseLIst as el JOIN gymMember as gm
						where er.exerciseNO = el.no	
						and er.barcode = gm.barcode
						and el.name = :name
						and date >= :beforedate and date <= :today 
						order by countRecord DESC LIMIT 3");
						$stmt -> execute(array(
							':name'=> $row['name'],
							':beforedate' => $beforedate,	
							':today' => $today
						));
					$rows2 = $stmt -> fetchAll();
					
					
					
					foreach ($rows2 as $row2 ) {
						
						
						$tmparray = array("name"=>$row2['list'],"member"=>$row2['member'],"count"=>$row2['countRecord']);
						$breathRankingForEachList = array_push_assoc($breathRankingForEachList ,$count,$tmparray);
						$count ++;
						
					}
					
			}
			else if($row['type'] == 1){
				//printf($row['name']);
					$stmt = $pdo->prepare("SELECT timeRecord , el.name as list ,gm.name as member
						FROM ExerciseRecord as er JOIN exerciseLIst as el JOIN gymMember as gm
						where er.exerciseNO = el.no	
						and er.barcode = gm.barcode
						and el.name = :name
						and date >= :beforedate and date <= :today 
						order by timeRecord ASC LIMIT 3");
						$stmt -> execute(array(
							':name'=> $row['name'],
							':beforedate' => $beforedate,	
							':today' => $today
						));
					$rows2 = $stmt -> fetchAll();
					
					
					
					foreach ($rows2 as $row2 ) {
						
						
						$tmparray = array("name"=>$row2['list'],"member"=>$row2['member'],"count"=>$row2['timeRecord']);
						$breathRankingForEachList = array_push_assoc($breathRankingForEachList ,$count,$tmparray);
						$count ++;
						
					}
					
			}

			$totalBreathRanking = array_push_assoc($totalBreathRanking ,$totalcount,$breathRankingForEachList);
			$totalcount ++;
			
		}
		
			//print_r($totalBreathRanking);
			return $totalBreathRanking;
		
		

	}
function array_push_assoc($array,$key,$value){
		$array[$key] = $value;
		return $array;
	}


	BreathRanking();

	
	


?>