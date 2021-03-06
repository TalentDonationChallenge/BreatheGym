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
	<?php adminSidebar("consulting"); ?>
	<!--sidebar end-->
	<!-- 글번호를 GET으로 받아와서 고고싱하기로 하겠습니다 -->
	<?php if (isset($_GET['no'])) {
		$consulting = new Consulting();
		$posting = $consulting->loadPost($_GET['no']); // 포스팅이 존재하지 않는 경우, $posting은 false를 반환
		$reply = $consulting->loadReply($_GET['no']); // 답변이 존재하지 않는 경우, $reply는 false
	}
	$page=isset($_GET['page'])?$_GET['page']:1;
	?>
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 상담</h3>
			<div class="col-lg-12 mt">
				<div class="panel panel-default mb">
					<div class="panel-heading"  no='<?=$_GET["no"]?>'>
						<span class="pull-right hidden-phone time">
							<?=$posting['writtenTime']?>
						</span>
						<span class="pull-right author"><?=$posting['nickname']?></span>
						<h2 class="panel-title"><?=htmlspecialchars($posting['title'])?></h2>
					</div>
					<div class="panel-body">
						<p><?=preg_match("/^ *$/", $posting['content'])?
						"&nbsp;":str_replace("\n", '<br />', htmlspecialchars($posting['content']));?></p>
					</div>
				</div>
				<h4><i class="fa fa-angle-right"></i> 답변</h4>
				<?php if ($reply) { ?>
				<div class="panel panel-default mb">
					<div class="panel-heading">
						<span class="pull-right hidden-phone time">
							<?=$reply['writtenTime']?>
						</span>
						<h2 class="panel-title"><?=htmlspecialchars($reply['title'])?></h2>
					</div>
					<div class="panel-body">
						<p><?=preg_match("/^ *$/", $reply['content'])?
						"&nbsp;":str_replace("\n", '<br />', htmlspecialchars($reply['content']));?></p>
					</div>
				</div>
				<?php } else { ?>
				<textarea class="form-control answer"></textarea>
				<?php }?>
				<div class="buttons mt">
					<button class="btn btn-default" name="button">
						<a href="index.php?page=<?=$page?>">목록</a>
					</button>
					<?=$reply?
					'<button class="btn btn-primary pull-right edit" name="button">수정</button>':
					'<button class="btn btn-primary pull-right submit" name="button">등록</button>'?>
				</div>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="../js/consulting.js"></script>
</body>
</html>
