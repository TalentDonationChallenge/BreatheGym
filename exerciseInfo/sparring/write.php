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
	<?php
		login();
		navigation();
	?>
	<section id="main-content">
		<section class="wrapper">
			<div class="container">
			<h3><i class="fa fa-angle-right"></i> 스파링영상</h3>
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="title" class="col-sm-1 control-label">제목</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="title" placeholder="제목을 입력하세요.">
						</div>
					</div>
				</div>
				<textarea class="write form-control" placeholder="내용을 입력하세요."></textarea>
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="youtube" class="col-sm-1 control-label">유튜브</label>
						<div class="col-sm-11">
							<input id="youtube" type="text" name="youtube" class="form-control" placeholder="http://">
						</div>
					</div>
				</div>
				<nav>
					<button class="btn mt mr btn-primary submit">확인</button>

					<button class="btn btn-default mt">
						<a href="index.php"><span>취소</span></a>
					</button>
				</nav>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="../js/board.js"></script>
</body>
</html>
