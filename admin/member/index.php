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
		'/common/css/style.css','/common/css/style-responsive.css',
		'/common/css/table-responsive.css', '/admin/css/member.css'));?>
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
	<?php adminSidebar("member"); ?>
	<!--sidebar end-->
	<section id="main-content" branch='<?=$branch?>'>
		<section class="wrapper">
			<div class="col-lg-12 mt">
				<h3><i class="fa fa-angle-right"></i> 회원목록 (<?=$branch?>호점)</h3>
				<div class="panel panel-default">
					<div class="panel-body table-panel">
						<button class="btn btn-default mt mb" name="button">
							<i class="fa fa-check-square-o"></i> 전체선택
						</button>
						<div class="form-inline pull-right mt mb">
							<select class="form-control">
								<option>이름</option>
								<option>바코드</option>
							</select>
							<input type="text" class="form-control">
							<button class="btn btn-primary" name="button">검색</button>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>이름</th>
									<th>전화번호</th>
									<th>마감일</th>
									<th>회원코드</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="checkbox"></td>
									<td>나익채</td>
									<td>010-5388-7127</td>
									<td>8월 20일</td>
									<td>뭐시기</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<button class="btn btn-success" name="button">SMS알림</button>
						<div class="btn-group">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="button">
								상태변경<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">활성</a></li>
								<li><a href="#">비활성</a></li>
								<li class="divider"></li>
								<li><a href="#">강퇴</a></li>
							</ul>
						</div>
						<button class="btn btn-primary" name="button">엑셀</button>
					</div>
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
