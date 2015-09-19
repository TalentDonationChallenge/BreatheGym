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
		$crossfitlibrary = new ImageBoard('crossfitLibrary');
		$posting = $crossfitlibrary->loadPost($_GET['no']);
		$comments = $crossfitlibrary->loadComments($_GET['no'], 'crossfitLibrary');
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
			<h3><i class="fa fa-angle-right"></i> 크로스핏 동작들</h3>
				<div class="panel panel-default mb mt">
					<div class="panel-heading">
						<span class="pull-right hidden-phone time">
							<?=$posting['writtenTime']?>
						</span>
						<span class="pull-right author"><?=$posting['nickname']?></span>
						<h2 class="panel-title"><?=htmlspecialchars($posting['title'])?></h2>
					</div>
					<div class="panel-body">
						<p>
							<?=preg_match("/^ *$/", $posting['content'])?
							"nbsp;":str_replace("\n", '<br />', htmlspecialchars($posting['content']));?>
						</p>
					</div>
					<div class="box-reply bg-color">
						<ul class="del-padding">
							<?php
							if ($comments) {
								foreach($comments as $comment) { ?>
							<li> <!-- 여기서부터 다음까지 댓글임 -->
								<div class="">
									<span class="nick-area">
										<a href="#"><?=$comment['nickname']?></a>
									</span>
									<span class="date"><?=$comment['writtenTime']?></span>
									<span></span>
									<a href="#" class="report">신고</a>
								</div>

								<div class="comm-content">
									<span><?=$comment['content']?></span>
								</div>
								<li class="comm-line"></li>
								<?php } } else { ?>
								<?="아직 댓글이 없습니다!"?>
								<li class="comm-line"></li>
								<?php } ?>
							</li>
						</ul>
						<div class="write-comm mt">
							<textarea class="form-control answer"></textarea>
						</div>
							<button type="button" class="btn btn-default btn-option mt">확인</button>
					</div>
					
				</div>
				
				<div class="buttons mt">
					<button class="btn btn-default" name="button">이전글</button>
					<button class="btn btn-default" name="button">다음글</button>
					<button class="btn btn-default" name="button">
						<a href="index.php">
							<span>목록</span>
						</a>
					</button>
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
