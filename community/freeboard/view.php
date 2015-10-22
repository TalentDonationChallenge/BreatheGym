<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
		array('/common/font-awesome/css/font-awesome.css',
			'/common/css/table-responsive.css','/community/css/community.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php if (isset($_GET['no'])) {
		$freeboard = new ImageBoard('freeboard');
		$freeboard->addHitCounter($_GET['no']); //조회수 ++
		$posting = $freeboard->loadPost($_GET['no']);
		$comments = $freeboard->loadComments($_GET['no'], 'freeBoard');
		$images = $posting['picture']=='1'?$freeboard->loadImages($_GET['no']):false;
	}
	login();
	navigation();
	$page=isset($_GET['page'])?$_GET['page']:1;
	?>
	<!--header start-->
	<!--header end-->
	<!--sidebar start-->
	<!--sidebar end-->
	<!-- 글번호를 GET으로 받아와서 고고싱하기로 하겠습니다 -->
	<section id="main-content">
		<section class="wrapper">
			<!-- <div class="col-lg-12 mt"> -->
			<div class="container">
			<h3><i class="fa fa-angle-right"></i> 자유게시판</h3>
				<div class="panel panel-default mb mt">
					<div class="panel-heading"  no='<?=$_GET["no"]?>'>
						<span class="pull-right hidden-phone time">
							<?=$posting['writtenTime']?>
						</span>
						<span class="pull-right author"><?=$posting['nickname']?></span>
						<h2 class="panel-title"><?=htmlspecialchars($posting['title'])?></h2>
					</div>
					<div class="panel-body">
						<p>
							<?php foreach ($images as $image) {
								$address = $image['fileName']?>
							<img src='upload/files/<?=$address?>' alt="attach image"><br /><br />
							<?php } ?>
						</p>
						<p>
							<?=preg_match("/^ *$/", $posting['content'])?
							"nbsp;":str_replace("\n", '<br />', htmlspecialchars($posting['content']));?>
						</p>
					</div>
					<div class="hit-reply hit-style">
							<span>댓글 <?php echo count($comments) ?></span>
							<span> &#124; 조회 <?=$posting['hits']?></span>
							<span class="pull-right">
							<span class="mouse-over edit">수정</span> &#124;
							<?=($_SESSION['email']===$posting['email'])||Utility::isManager()?
							'<span class="mouse-over delete">삭제</span>':
							'<span class="mouse-over report">신고</span>'?>
							</span>
					</div>
					<div class="box-reply bg-color">
						<ul class="del-padding">
							<?php
							if ($comments) {
								foreach($comments as $comment) { ?>
							<li> <!-- 여기서부터 다음까지 댓글임 -->
								<div no='<?=$comment["no"]?>'>
									<span class="nick-area">
										<a href="#"><?=$comment['nickname']?></a>
									</span>
									<span class="date"><?=$comment['writtenTime']?></span>
									<?=($_SESSION['email']===$posting['email'])||Utility::isManager()?
									'<span class="delete">삭제</span>':
									'<span class="report">신고</span>'?>
								</div>

								<div class="comm-content">
									<span><?=$comment['content']?></span>
								</div>
								<li class="comm-line"></li>
								<?php }
							} else { ?>
								<?="아직 댓글이 없습니다!"?>
								<li class="comm-line"></li>
								<?php } ?>
							</li>
						</ul>
						<button type="button" class="btn btn-default btn-option mt">확인</button>
						<div class="write-comm mt">
							<textarea class="form-control answer"></textarea>
						</div>
					</div>

				</div>

				<div class="buttons mt">
					<a href="index.php">
						<button class="btn btn-default" name="button">목록</button>
					</a>
				</div>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="../js/freeboard.js"></script>
</body>
</html>
