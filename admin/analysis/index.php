<?php
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css'));?>
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
							<div class="chart mt">
								<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
								data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
								data-highlight-line-color="#fff" data-spot-radius="4"
								data-data="[200,135,667,333,526,996]"></div>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>날짜별 출석회원수</h5>
							</div>
							<div class="chart mt">
								<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
								data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
								data-highlight-line-color="#fff" data-spot-radius="4"
								data-data="[100,817,30,333,526,20]"></div>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>시간대별 출석회원수</h5>
							</div>
							<div id="piechart"></div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="content-panel">
							<h4>전체 회원 수 추이</h4>
							<div class="panel-body">
								<div id="line-graph" class="graph"></div>
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
	<script src="/common/js/raphael-min.js"></script>
	<script src="/common/js/morris.min.js"></script>
	<script src="/admin/js/analysis.js"></script>
	<script src="/admin/js/jquery.sparkline.min.js.gz"></script>
</body>
</html>
