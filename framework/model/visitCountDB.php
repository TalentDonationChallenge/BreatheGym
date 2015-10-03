<?php

	class VisitCountDB {
        public static function isAlreadyVisit($sessionID,$today) { //마감일 구하기
          //  echo "User register";
            $pdo = Database::getInstance();
    		$stmt = $pdo->prepare("SELECT COUNT(sessionId) FROM visitRecord WHERE sessionId = :SId AND date = :today");
		    $stmt -> execute(array(
		    	':SId'=>$sessionID,
		    	':today' => $today
		    	));
		    $row = $stmt -> fetch();
            $isAlreadyVisit =  $row['COUNT(sessionId)'];

            return $isAlreadyVisit;
        }

       public static function insertVisitRecord($sessionID,$today) { //마감일 구하기
           $pdo = Database::getInstance();
	       $stmt = $pdo->prepare("INSERT INTO visitRecord (sessionId, date)
	    		VALUES (:sessionId, :today)");
	       $stmt -> execute(array(
	    		':sessionId'=> $sessionID,
	    		':today' => $today
	   	    ));

	       return 1;
        }

        public static function showTodayVisitRecord() { //마감일 구하기
        	$today = date('Y-m-d');
            $pdo = Database::getInstance();
		    $stmt = $pdo->prepare("SELECT COUNT(*) FROM visitRecord WHERE date = :today");
		    $stmt -> execute(array(
		    	':today' => $today));
		    $row = $stmt -> fetch();
		    $todayVisitRecord =  $row['COUNT(*)'];
		    return $todayVisitRecord;
        }
        

        //연속출석같은 경우, 공휴일이나 여기 쉬는날은 어떻게해?!
        //출석률도 좀 이상할것같고... ㅠㅠ

    }





?>