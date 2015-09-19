<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 브리드 이야기',
		array('/board/css/lightbox.css','/common/font-awesome/css/font-awesome.css',
			'/common/css/table-responsive.css','/community/css/community.css',
			'/common/css/navigation.css','/common/css/index.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<script src="/common/js/facebook.js"></script>
	<!-- 페이스북 SDK load -->
	<?php
<<<<<<< HEAD:board/breatheBoard/index.php
		login();
		navigation();
		$breatheboard=new ImageBoard('breatheBoard');
		$page = isset($_GET['page'])?$_GET['page']:1;
	?>
	<!--header start-->
	<?php //communityHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php //communitySidebar("board/breatheboard"); ?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">

			<!-- <div class="col-lg-12 mt"> -->
			<div class="container">
			<h3><i class="fa fa-angle-right"></i> 브리드이야기</h3>
				<div class="panel panel-default mt">
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
							<?php
								$posts = $breatheboard->loadPostList($page);
								foreach($posts as $post) { ?>
									<tr>
										<td><?=$post['no']?></td>
										<td><a href="view.php?page=<?=$page?>&amp;no=<?=$post['no']?>">
										<?=$post['title']?>
										</a></td>
										<td><?=$post['nickname']?></td>
										<td><?=$post['writtenTime']?></td>
										<td><?=$post['hits']?></td>
									</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<nav>
					<ul class="pagination">
					<?php
					$allPages = $breatheboard->pageCount(); // 다음부터 수정(a.k.a. 복붙)할때 이부분에 게시판 이름을 수정하면 된다
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

					<button type="button" class="btn pull-right btn-primary btn-write">
						글쓰기
					</button>
				</nav>
=======
	login();
	navigation();
	?>
	<section class='wrapper'>
		
		<div class='container'>
			<h1>브리드 이야기</h1>
			<div class='row'>
				<div class='col-md-3 col-xs-6'>
					<div class='panel panel-default'>
						<img src='crossfit.jpg' width='100%'/>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='panel panel-default'>
						<img src='crossfit.jpg' width='100%'/>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='panel panel-default'>
						<img src='crossfit.jpg' width='100%'/>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='panel panel-default'>
						<img src='crossfit.jpg' width='100%'/>
					</div>
				</div>
>>>>>>> 10dd3cff29ff41346af319d9edefb2dc4d0781bd:board/breatheStory/index.php
			</div>
		</div>
	</section>
<<<<<<< HEAD:board/breatheBoard/index.php
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="../js/breatheboard.js"></script>
=======
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<!--<script src="/common/js/common-scripts.js"></script>-->
<script src="/board/js/lightbox-plus-jquery.js"></script>
>>>>>>> 10dd3cff29ff41346af319d9edefb2dc4d0781bd:board/breatheStory/index.php
</body>
</html>