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
			</div>
		</div>
	</section>
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<!--<script src="/common/js/common-scripts.js"></script>-->
<script src="/board/js/lightbox-plus-jquery.js"></script>
</body>
</html>