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
	$consulting = new Consulting();
	$page = isset($_GET['page'])?$_GET['page']:1;
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
						$posts = $consulting->loadPostList($page);
						foreach ($posts as $post) { ?>
						<tr>
							<td><?=$post['no']?></td>
							<td><a href="view.php?page=<?=$page?>&amp;no=<?=$post['no']?>">
								<?=$post['title']?>
							</a></td>
							<td><?=$post['nickname']?></td>
							<td><?=$post['writtenTime']?></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<nav>
					<ul class="pagination">
					<?php
					$allPages = $consulting->pageCount();
					$pagingStart = $page%5==0?$page-4:$page-($page%5)+1; ?>
					<?=$page<=5?'':
					'<li>
						<a href="index.php?page='.($pagingStart-1).'" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						</a>
					</li>'?>
					<?php
					for ($i=$pagingStart; $i < $pagingStart+5 ; $i++) {
						if ($i==$allPages+1) break;?>
						<li class="<?=$page==$i?"active":""?>">
							<a href="index.php?page=<?=$i?>"><?=$i?></a>
						</li>
					<?php }?>
					<?=$pagingStart+4<$allPages?
					'<li>
						<a href="index.php?page='.($pagingStart+5).'" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						</a>
					</li>':''?>
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
