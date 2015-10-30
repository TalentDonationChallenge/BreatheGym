<?php
	require_once(__DIR__.'/../../framework/framework.php');
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
		$boxinglibrary=new ImageBoard('boxingLib');
		$page = isset($_GET['page'])?$_GET['page']:1;
	?>
	<!--header start-->
	<?php //communityHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php //communitySidebar("exerciseInfo/boxingLibrary"); ?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">

			<!-- <div class="col-lg-12 mt"> -->
			<div class="container">
			<h3><i class="fa fa-angle-right"></i> 복싱자료실</h3>
			<div class="row">
			<?php
				$posts = $boxinglibrary->loadPostList($page, 8);
				if (empty($posts)) { ?>
					<div class='col-md-12 col-xs-12'>
						포스트가 없습니다.
					</div>
				<?php } else {
					foreach ($posts as $post) {
						$video = $boxinglibrary->loadVideo($post['no']);
						$images = $boxinglibrary->loadImages($post['no']);
						if (empty($video)) {
							if(empty($images)) $thumbnail = "/resources/crossfit.jpg";
							else $thumbnail = $images[0]['fileName'];
						} else {
							$thumbnail = $video['thumbnail'];
						} ?>
						<div class="col-sm-3 mt">
							<a href="view.php?page=<?=$page?>&amp;no=<?=$post['no']?>">
								<div class="panel panel-default cross-panel">
									<div class="panel-body">
										<img src="<?=$thumbnail?>" alt="post image">
									</div>
									<div class="panel-footer">
										<span class="inline-to-block"><?=$post['title']?></span>
										<span>조회수 <?=$post['hits']?> &#124; <?=$post['writtenTime']?></span>
										<span class="inline-to-block"><?=$post['nickname']?></span>
									</div>
								</div>
							</a>
						</div>
				<?php } }?>
			</div>
				<nav>
					<ul class="pagination">
					<?php
					$allPages = $boxinglibrary->pageCount(15); // 다음부터 수정(a.k.a. 복붙)할때 이부분에 게시판 이름을 수정하면 된다
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
					<?php if(Utility::isLoggedIn()) { ?>
					<a href="write.php">
						<button type="button" class="btn pull-right btn-primary btn-write">
							글쓰기
						</button>
					</a>
					<? }?>
				</nav>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/navigation.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<!-- <script src="../js/boxinglibrary.js"></script> -->
</body>
</html>
