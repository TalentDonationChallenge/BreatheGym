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
			<h3><i class="fa fa-angle-right"></i> 운동후기</h3>
			<!-- <div class="col-lg-12 mt"> -->

				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="title" class="col-sm-1 control-label">제목</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="title" placeholder="제목을 입력하세요.">
						</div>
					</div>
					<div class="form-group">
						<label for="attach" class="col-sm-1 control-label">이미지첨부</label>
						<div class="col-sm-11">
							<input id="attach" type="file" name="image">
						</div>
					</div>
				</div>
				<textarea class="write form-control" placeholder="내용을 입력하세요."></textarea>
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
	<script src="../js/review.js"></script>
</body>
</html>
