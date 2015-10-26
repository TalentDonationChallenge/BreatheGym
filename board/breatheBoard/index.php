<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 브리드 이야기',
		array('/board/css/board.css','/common/font-awesome/css/font-awesome.css',
			'/common/css/table-responsive.css','/community/css/community.css',
			'/common/css/navigation.css','/common/css/index.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--<script src="/common/js/facebook.js"></script>-->
	<!-- 페이스북 SDK load -->
	<?php
	login();
	navigation();
	$breatheBoard=new ImageBoard('breatheBoard');
	$page = isset($_GET['page'])?$_GET['page']:1;
	?>

	<section class='wrapper content'>
		<div class='container'>
			<h1>브리드 이야기</h1>
			<div class='row'>
			<?php
				$posts= $breatheBoard->loadPostList($page);
				if (empty($posts)) { ?>
					<div class='col-md-12 col-xs-12'>
						포스트가 없습니다.
					</div>
				<?php } else {
					foreach($posts as $post) {
						$images = $breatheBoard->loadImages($post['no']); ?>
						<div class='col-md-3 col-xs-12'>
							<a href='view.php?page=<?=$page?>&amp;no=<?=$post['no']?>'>
								<div class='panel panel-default' id='item'>
									<div class='panel-body item'>
										<img src='<?=empty($images)?"/resources/crossfit.jpg":"upload/files/".$images[0]['fileName']?>' height ='100%'/>
									</div>
									<div class='panel-footer'>
										<?=$post['title']?>(<?=$breatheBoard->countComments($post['no'], 'breatheBoard')?>)
									</div>
								</div>
							</a>
						</div>
					<?php
					}
				}
			?>
			</div>
			<!--
			<div class='row'>
				<div class='col-md-3 col-xs-12 col-md-offset-1'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							제2호점 개점!
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-12'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							안산 프로복싱 라이선스 후기
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-12'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							안산 프로복싱 라이선스 후기
						</div>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-3 col-xs-12 col-md-offset-1'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							제3회 스파링 데이! 그 뜨거운 열기 속으로
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-12'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							2호점 오프라인 모임 개최!
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-12'>
					<div class='panel panel-default' id='item'>
						<div class='panel-body item'>
							<img src='/resources/crossfit.jpg' height='100%'/>
						</div>
						<div class='panel-footer'>
							2호점 오프라인 모임 개최!
						</div>
					</div>
				</div>
			</div>
			-->

			<nav>
				<ul class="pagination">
				<?php
				$allPages = $breatheBoard->pageCount(); // 다음부터 수정(a.k.a. 복붙)할때 이부분에 게시판 이름을 수정하면 된다
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
				<?php if (Utility::isLoggedIn()) {
					if (Utility::isManager()) { ?>
				<a href="write.php">
					<button type="button" class="btn pull-right btn-primary btn-write">
						글쓰기
					</button>
				</a>
				<?php } } ?>
			</nav>
		</div>
	</section>
	<script src='/common/js/jquery-1.11.1.min.js'></script>
	<script src='/common/js/jquery-ui.custom.min.js'></script>
	<script src='/common/js/jquery.dcjqaccordion.2.7.js'></script>
	<script src='/common/js/bootstrap.min.js'></script>
	<script src='/common/js/navigation.js'></script>
	<script src='/board/js/breatheBoard.js'></script>
	<script src='/common/js/facebook.js'></script>
	<!--<script src="/common/js/common-scripts.js"></script>-->
</body>
</html>
