<?php
	require_once(__DIR__.'/../../framework/framework.php');
	if (isset($_GET['no'])&&($_GET['no']==='1'||$_GET['no']==='2')) { //몇호점인지 찾기
		$branch = $_GET['no'];
	} else {
		//에러로 보내버리기
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css',
		'/common/css/table-responsive.css',
		'../css/record.css'));?>
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
	<section id="main-content" branch='<?=$branch?>'>
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 기록관리 (<?=$branch?>호점)</h3>
			<!-- page start-->
			<div class="panel panel-default">
				<section class="panel-body table-panel">
					<ul class="nav nav-tabs exercises">
					</ul>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
							<tr>
								<td>이름</td>
								<td>회원코드</td>
								<td>출석시간</td>
								<td>기록입력</td>
							</tr>
						</thead>
						<tbody>
							<!-- <td class="info" colspan="4">
								hi
							</td> -->
						</tbody>
						</table>
					</div>
				</section>
				<section class="panel-footer">
					<div class="align-right">
						<button class='btn btn-primary' type='submit'>저장</button>
					</div>
				</section>

			</div><!-- page end-->
		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/jquery-ui.custom.min.js"></script>
	<script src="/common/js/moment.min.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="../js/record-scripts.js"></script>
</body>
</html>
