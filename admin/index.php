<?php 
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴', 
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css',
		'/common/css/table-responsive.css',
		'/common/css/to-do.css',
		'/common/css/zabuto_calendar.css'));?>
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
	<aside>
		<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
			<ul class="sidebar-menu" id="nav-accordion">
			<li class="mt">
				<a class="active" href="index.php">
					<i class="fa fa-dashboard"></i>
					<span>대쉬보드</span>
				</a>
			</li>

			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-desktop"></i>
					<span>회원관리</span>
				</a>
			</li>

			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-cogs"></i>
					<span>정보분석</span>
				</a>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-book"></i>
					<span>운동관리</span>
				</a>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-tasks"></i>
					<span>상담</span>
				</a>
			</li>
			</ul>
		<!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="js/common-scripts.js"></script>
</body>
</html>