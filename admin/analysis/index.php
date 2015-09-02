<?php
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css','/common/css/style-responsive.css',
		'/admin/css/analysis.css'));?>
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
	<?php adminSidebar("analysis"); ?>
	<!--sidebar end-->
	<section id = "main-content">
		<section class = "wrapper">
			<div class = "col-lg-12 mt">
				<div class = "row">
					<div class="col-md-4 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>월별 가입회원수</h5>
							</div>
							<div class="chart">
								<canvas id="chart"></canvas>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>날짜별 출석회원수</h5>
							</div>
							<div class="chart">
								<canvas id="chart2"></canvas>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>시간대별 출석회원수</h5>
							</div>
							<canvas id="piechart"></canvas>
						</div>
					</div>
					<div class="col-md-12">
						<div class="content-panel">
							<h4>전체 회원 수 추이</h4>
							<div class="panel-body">
								<canvas id="bar-graph"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="/admin/js/analysis.js"></script>
	<script src="/common/js/Chart.min.js"></script>
</body>
</html>
