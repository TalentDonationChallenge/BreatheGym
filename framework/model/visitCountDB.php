<?php

	//
	//홈페이지 방문자 수를 저장 해 놓은 visitRecord DB 와 연관된 함수들입니다.

	


	class VisitCountDB {
		//isAlreadyVisit() 함수
		//sessionId를 이용하여 접속한 방문자가 오늘 방문했던 적이 있는지 여부를 알아보는 함수입니다.
		//sessionId와 오늘 날짜를 인자로 받아 visitRecord에 저장된 데이터인지, 아닌지를 count하여 return합니다.
        public static function isAlreadyVisit($sessionID,$today) { 

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


        //insertVisitRecord() 함수
		//isAlreadyVisit() 함수를 통해 visitRecord 에 데이터가 없으면 방문하지 않았던 사람이므로 방문했다는 기록을 남기기 위해 visitRecord에 데이터를 저장합니다.
		
       
       public static function insertVisitRecord($sessionID,$today) { 
           $pdo = Database::getInstance();
	       $stmt = $pdo->prepare("INSERT INTO visitRecord (sessionId, date)
	    		VALUES (:sessionId, :today)");
	       $stmt -> execute(array(
	    		':sessionId'=> $sessionID,
	    		':today' => $today
	   	    ));

	       return 1;
        }



   		//showTodayVisitRecord()함수
		//db에 저장된 방문자 기록을 count하여 호출한 페이지에 그 수를 보여줍니다.
		
      	public static function showTodayVisitRecord() { 
        	$today = date('Y-m-d');
            $pdo = Database::getInstance();
		    $stmt = $pdo->prepare("SELECT COUNT(*) FROM visitRecord WHERE date = :today");
		    $stmt -> execute(array(
		    	':today' => $today));
		    $row = $stmt -> fetch();
		    $todayVisitRecord =  $row['COUNT(*)'];
		    return $todayVisitRecord;
        }
        

       

    }





?>