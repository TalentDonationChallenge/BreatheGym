<?php

 require_once(__DIR__.'/../../framework/framework.php');

//회원 출석을 DB에 저장하는 php 파일입니다.
//barbode 리더기를 통해 전송된 barcode 번호와 전송된 시간(날짜와 시간)을 DB에 저장합니다.
//Attendance class 는 framwork/model/attendance.php 에 있습니다. 

 if(isset($_POST['barcode'])){
 	$userBarcode = $_POST['barcode'];
 	$attendDate = date('Y-m-d H:m:s');

 	Attendance::addAttendance($userBarcode,$attendDate);

 }


 ?>