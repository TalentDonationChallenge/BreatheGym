<?php
	require_once(__DIR__.'/../../framework/framework.php');
	if (!Utility::isLoggedIn()) {
		header("Location: /error.php");
	} else {
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
		array('/common/font-awesome/css/font-awesome.css',
			'/common/css/table-responsive.css','/community/css/community.css',
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
	$consulting=new Consulting();
	$page = isset($_GET['page'])?$_GET['page']:1;
	?>

	<section id="main-content">
		<section class="wrapper">
			<!-- <div class="col-lg-12 mt"> -->

			<div class="container">
				<h3><i class="fa fa-angle-right"></i> 상담</h3>
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="inputEmail3" class="col-sm-1 control-label">제목</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="title" placeholder="제목을 입력하세요.">
						</div>
					</div>
				</div>
				<textarea class="write form-control mt" placeholder="내용을 입력하세요."></textarea>

				<nav>
					<button class="btn mt mr btn-primary">확인</button>
				</nav>

				<div class="panel panel-default mt-alot">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="hidden-phone">번호</th>
								<th>제목</th>
								<th>글쓴이</th>
								<th class="hidden-phone">작성일</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$posts = $consulting->loadConsultingList($page);
							foreach($posts as $post) { ?>
							<tr>
								<td><?=$post['no']?></td>
								<td><a href="view.php?page=<?=$page?>&amp;no=<?=$post['no']?>">
									<?=$post['title']?>
								</a></td>
								<td><?=$post['nickname']?></td>
								<td><?=$post['writtenTime']?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<nav>
					<ul class="pagination">
						<?php
					$allPages = $consulting->pageCount(15); // 다음부터 수정(a.k.a. 복붙)할때 이부분에 게시판 이름을 수정하면 된다
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
<script src="/common/js/navigation.js"></script>
<script src="/common/js/common-scripts.js"></script>
<script src="../js/consulting.js"></script>
</body>
</html>
<?php }?>
