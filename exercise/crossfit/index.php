<?php
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 회원운동기록관리',
	array('/common/font-awesome/css/font-awesome.css',
        '/common/css/style.css','/common/css/style-responsive.css',
        '/exercise/css/exercise.css','/exercise/css/morris.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--header start-->
	<?php memberHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("crossfit"); ?>
	<!--sidebar end-->
	<section id = "main-content">
		<section class = 'wrapper'>
			<div class = "col-lg-12 mt">
				<h3>오늘</h3>
				<div class="row">
				<!-- 순위 -->
					<div class="col-md-6">
						<div class="content-panel rank mb">
							<ul class="nav nav-tabs exercises">
							</ul>
							<table class="table table-striped">
							<thead>
							<tr>
								<th>순위</th>
								<th>이름</th>
								<th>기록</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							</table>
						</div>
					</div>
					<!--회원 개인 기록-->
					<div class="col-md-6">
						<div class="content-panel record mb">
							<h4>회원 개인기록</h4>
							<table class="table table-striped">
								<thead>
								<tr>
									<th>운동종류</th>
									<th>기록</th>
									<th>백분위</th>
								</tr>
								</thead>
								<tbody>
								<?php //$exercises = AdminRecordManage::getExercises(date("Y-m-d"));
							//	foreach ($exercises as $exercise) {
							//		$userRecord =
							//		MemberCrossfitManagement::getUserRecord($_SESSION['barcode'], $exercise);
							//		if(!$userRecord) continue;?>
								<tr>
									<td>윗몸일으키기</td>
									<td>23</td>
									<td>10%</td>
								</tr>
								<tr>
									<td>케틀벨</td>
									<td>42</td>
									<td>5%</td>
								</tr>
								<?php //} ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="content-panel">
							<h4>운동 기록 추이</h4>
							<div class="panel-body">
								<div>
									<canvas id="line-graph" class="graph"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- row-->
			</div><!-- /col-md-12 -->
		</section> <!--wrapper-->
	</section> <!-- MAIN CONTENT-->
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="/common/js/Chart.min.js"></script>
	<script src="/exercise/js/crossfit.js"></script>
</body>
</html>
