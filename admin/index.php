<?php
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css','/common/css/style-responsive.css',
		'/admin/css/dashboard.css'));?>
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
	<?php adminSidebar("index"); ?>
	<!--sidebar end-->
	<section id='main-content'>
		<section class='wrapper'>
			<div class="col-lg-12 mt">
				<div class="row">
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>체육관 회원수</h5>
							</div>
							<h1><i class="icon fa fa-users"></i></h1>
							<h3><?=AdminInformation::pageMemberCount()?>명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>체육관 오늘 출석</h5>
							</div>
							<h1><i class="icon fa fa-calendar-check-o"></i></h1>
							<h3><?=AdminInformation::attendanceCount()?>명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>최근 웹페이지 가입자 (1개월)</h5>
							</div>
							<h1><i class="icon fa fa-user-plus"></i></h1>
							<h3><?=AdminInformation::recentlyJoinedMember()?>명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>웹페이지 방문자 수 (오늘)</h5>
							</div>
							<h1><i class="icon fa fa-bar-chart-o"></i></h1>
							<h3>104명</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<h3>이번 주 만료 예정자</h3>
				<div class="content-panel">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>이름</th>
								<th>등록일</th>
								<th>마감일</th>
								<th>전화</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>나익채</td>
								<td>7월 20일</td>
								<td>8월 20일</td>
								<td>010-5388-7127</td>
							</tr>
							<tr>
								<td>김가연</td>
								<td>7월 20일</td>
								<td>8월 20일</td>
								<td>010-4045-9103</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
</body>
</html>
