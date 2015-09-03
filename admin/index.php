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
			<div class="col-lg-9 mt">
				<div class="row">
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>총 회원수</h5>
							</div>
							<h1><i class="icon fa fa-users"></i></h1>
							<h3>115명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>오늘 출석</h5>
							</div>
							<h1><i class="icon fa fa-calendar-check-o"></i></h1>
							<h3>79명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>최근 가입자</h5>
							</div>
							<h1><i class="icon fa fa-user-plus"></i></h1>
							<h3>13명</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>방문자 수</h5>
							</div>
							<h1><i class="icon fa fa-bar-chart-o"></i></h1>
							<h3>104명</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<h3>만료자</h3>
				<div class="content-panel">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>이름</th>
								<th>시간</th> <!-- 시간은 왜있냐능.. -->
								<th>등록일</th>
								<th>마감일</th>
								<th>전화</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>나익채</td>
								<td>??</td>
								<td>7월 20일</td>
								<td>8월 20일</td>
								<td>010-5388-7127</td>
							</tr>
							<tr>
								<td>김가연</td>
								<td>??</td>
								<td>7월 20일</td>
								<td>8월 20일</td>
								<td>010-4045-9103</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="ds visible-lg">
			  <!--COMPLETED ACTIONS DONUTS CHART-->
				  <h3>알림</h3>

				<!-- First Action -->
				<div class="desc">
				  <div class="thumb">
					  <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				  </div>
				  <div class="details">
					  <p><muted>2 Minutes Ago</muted><br/>
						 <a href="#">James Brown</a> subscribed to your newsletter.<br/>
					  </p>
				  </div>
				</div>
				<!-- Second Action -->
				<div class="desc">
				  <div class="thumb">
					  <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				  </div>
				  <div class="details">
					  <p><muted>3 Hours Ago</muted><br/>
						 <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
					  </p>
				  </div>
				</div>
				<!-- Third Action -->
				<div class="desc">
				  <div class="thumb">
					  <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				  </div>
				  <div class="details">
					  <p><muted>7 Hours Ago</muted><br/>
						 <a href="#">Brandon Page</a> purchased a year subscription.<br/>
					  </p>
				  </div>
				</div>
				<!-- Fourth Action -->
				<div class="desc">
				  <div class="thumb">
					  <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				  </div>
				  <div class="details">
					  <p><muted>11 Hours Ago</muted><br/>
						 <a href="#">Mark Twain</a> commented your post.<br/>
					  </p>
				  </div>
				</div>
				<!-- Fifth Action -->
				<div class="desc">
				  <div class="thumb">
					  <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				  </div>
				  <div class="details">
					  <p><muted>18 Hours Ago</muted><br/>
						 <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
					  </p>
				  </div>
				</div>
			</div><!-- /col-lg-3 -->
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
</body>
</html>
