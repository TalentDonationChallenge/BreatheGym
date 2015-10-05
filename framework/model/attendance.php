<?php
    /**
     *
     */
    class Attendance {
        function addAttendance($barcode,$attendDate) {
            
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare("INSERT INTO attendance (barcode, date) VALUES (:barcode, :attendDate)");
			$stmt -> execute(array(
				':barcode'=> $barcode,
				':attendDate' => $attendDate
			));
            
        }
    }

?>
