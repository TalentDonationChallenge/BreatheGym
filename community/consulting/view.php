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
		$consulting = new Consulting();
		$posting = $consulting->loadPost($_GET['no']);
		$reply = $consulting->loadReply($_GET['no']);
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
			<h3><i class="fa fa-angle-right"></i> 상담</h3>
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
							<?=preg_match("/^ *$/", $posting['content'])?
							"&nbsp;":str_replace("\n", '<br />', htmlspecialchars($posting['content']));?>
						</p>
					</div>
				</div>

				<h3><i class="fa fa-angle-right mt"></i> 답변</h3>
				<div class="panel panel-default mb mt">
					<div class="panel-body">
						<p>
							<?php if($reply){ ?>
								<?= preg_match("/^ *$/", $reply['content'])?
								"&nbsp;":str_replace("\n", '<br />', htmlspecialchars($reply['content'])); ?>
							<?php } else { ?>
								아직 답변이 작성되지 않았습니다.
							<? } ?>
						</p>
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
</body>
</html>
