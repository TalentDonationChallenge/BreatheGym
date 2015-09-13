<?php
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/table-responsive.css','/community/freeboard/css/freeboard.css',
		'/common/css/navigation.css','/common/css/index.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php
		login();
		navigation();
	?>
	<!--header start-->
	<?php //communityHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php //communitySidebar("community/freeboard"); ?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">
			
			<!-- <div class="col-lg-12 mt"> -->
			<div class="container">
			<h3><i class="fa fa-angle-right"></i> 상담</h3>
				<div class="panel panel-default">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="hidden-phone">번호</th>
								<th>제목</th>
								<th>글쓴이</th>
								<th class="hidden-phone">작성일</th>
								<th>조회</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="hidden-phone">3</td>
								<td>레레레레옹</td>
								<td>이지은</td>
								<td class="hidden-phone">09/10 21:41:09</td>
								<td>4</td>
							</tr>
							<tr>
								<td class="hidden-phone">2</td>
								<td>티키타 리듬에 맞춰 스핀 기타 리프의 테마는 스팅의 쉡오마할</td>
								<td>아이유</td>
								<td class="hidden-phone">09/03 10:21:58</td>
								<td>1</td>
							</tr>
							<tr>
								<td class="hidden-phone">1</td>
								<td>나이 값을 떼먹은 남자</td>
								<td>명수</td>
								<td class="hidden-phone">09/02 18:32:23</td>
								<td>21</td>
							</tr>
						</tbody>
					</table>
				</div>
				<nav>
					<ul class="pagination">
					<li class="disabled">
						<a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li class="disabled">
						<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
					</ul>

					<button type="button" class="btn btn-default pull-right btn-primary">
						글쓰기
					</button>
				</nav>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
</body>
</html>
