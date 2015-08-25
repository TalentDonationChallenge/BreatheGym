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
						<div class="content-panel mb">
							<ul class="nav nav-tabs exercises">
							<li class="active"><a href="#">윗몸일으키기</a></li>
							<li><a href="#">팔굽혀펴기</a></li>
							<li><a href="#">로잉</a></li>
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
								<tr>
									<td>1</td>
									<td>손아섭</td>
									<td>100</td>
								</tr>
								<tr>
									<td>2</td>
									<td>강민호</td>
									<td>80</td>
								</tr>
								<tr>
									<td>3</td>
									<td>아두치</td>
									<td>79</td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!--회원 개인 기록-->
					<div class="col-md-6">
						<div class="content-panel mb">
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
									<tr>
										<td>윗몸일으키기</td>
										<td>50</td>
										<td>30%</td>
									</tr>
									<tr>
										<td>윗몸일으키기</td>
										<td>50</td>
										<td>30%</td>
									</tr>
									<tr>
										<td>윗몸일으키기</td>
										<td>50</td>
										<td>30%</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="content-panel">
							<h4>운동 기록 추이</h4>
							<div class="panel-body">
								<div id="line-graph" class="graph"></div>
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
	<script src="/exercise/js/raphael-min.js"></script>
	<script src="/exercise/js/morris.min.js"></script>
	<script src="/exercise/js/crossfit.js"></script>
</body>
</html>
