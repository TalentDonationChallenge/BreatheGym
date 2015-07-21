<?php 
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴', 
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css',
		'../css/fullcalendar.min.css',
		'../css/exercise.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--header start-->
	<?php adminHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php adminSidebar("record"); ?>
	<!--sidebar end-->
	<!-- Main content start -->
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 기록관리 </h3>
			<!-- page start-->
			<div class="row mt">
				
				<section class="panel">
					<table class="record-table">
						<colgroup>
							<col width="20px"/>
							<col width="10%"/>
							<col width="20%"/>
							<col width="30%"/>
							<col width="30%"/>
						</colgroup>
						<thead>
							<tr>
								<th>ㅁ</th>
								<th>이름</th>
								<th>출석시간</th>
								<th>운동종류</th>
								<th>기록입력</th>
							</tr>
						</thead>
						<tbody>
							<!-- contents heare -->
							<tr>
								<td>ㅁ</td>
								<td>심종규</td>
								<td>2014-07-20 16:30:21</td>
								<td>윗몸일으키기</td>
								<td>12:30</td>
							</tr>
							<?php
								//$members = AdminRecordManage::getTodayMemebers();
								echo "<script>alert(\"$members\");</script>";
								if(count($members)==0){
									echo "<tr><td>오늘 출석자 없습니다</td></tr>";
								}
							?>
						</tbody>
					</table>
				</section>
				
			</div><!-- page end-->
		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="../js/jquery-ui.custom.min.js"></script>
	<script src="../js/moment.min.js"></script>

	<script src="../js/common-scripts.js"></script>  
</body>
</html>