<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
		array('/common/font-awesome/css/font-awesome.css',
			'/common/css/table-responsive.css','/exerciseInfo/css/exerciseInfo.css',
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
	$crossfitlibrary=new ImageBoard('crossfitLib');
	$page = isset($_GET['page'])?$_GET['page']:1;
	?>
	<!--header start-->
	<?php //communityHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php //communitySidebar("exerciseInfo/crossfitlibrary"); ?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">
			<div class="container">
				<h3><i class="fa fa-angle-right"></i> 크로스핏 자료실</h3>
				<div class="row">
					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

					<div class="col-sm-3 mt">
						<div class="panel panel-default cross-panel">
							<div class="panel-body">
								<img src="/introduction/images/ali.jpg" alt="Boxer Ali">
							</div>
							<div class="panel-footer">
								<span class="inline-to-block">제목</span>
								<span>조회 89</span>
								<span> &#124; 15.07.31</span>
								<span class="inline-to-block">글쓴이</span>
							</div>
						</div>
					</div>

				</div>

				<nav>
					<ul class="pagination">
						<?php
					$allPages = $crossfitlibrary->pageCount(); // 다음부터 수정(a.k.a. 복붙)할때 이부분에 게시판 이름을 수정하면 된다
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

			<a href="write.php">
				<button type="button" class="btn pull-right btn-primary btn-write">
					글쓰기
				</button>
			</a>
		</nav>
	</div>
</section>
</section>
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/navigation.js"></script>
<script src="/common/js/common-scripts.js"></script>
<script src="../js/crossfitlibrary.js"></script>
</body>
</html>
