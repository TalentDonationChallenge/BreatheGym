<?php
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css','/common/css/style-responsive.css',
		'/common/css/table-responsive.css','/admin/css/consulting.css'));?>
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
	<?php adminSidebar("consulting");
	$consulting = new Consulting('consulting');
	?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 상담</h3>
			<div class="col-lg-12 mt">
				<div class="panel panel-default">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="hidden-phone">번호</th>
								<th>제목</th>
								<th>글쓴이</th>
								<th class="hidden-phone">작성시간</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$posts = $consulting->loadPostList(1);
							foreach ($posts as $post) { ?>
							<tr>
								<td><?=$post['no']?></td>
								<td><?=$post['title']?></td>
								<td><?=$post['nickname']?></td>
								<td><?=$post['writtenTime']?></td>
							</tr>
							<?php } ?>
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
