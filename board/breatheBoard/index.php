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
	?>
	<div class='zoom' id='zoom'>
		<i class='fa fa-close fa-3x pull-right close'></i>
		<div class='container-fluid scroll'>
			<img src='/resources/crossfit.jpg'/>
		</div>
		
	</div>
	<section class='wrapper content'>
		<div class='container text-centered'>
			<h1>브리드 이야기</h1>
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
			
		</div>
	</section>
	<script src='/common/js/jquery-1.11.1.min.js'></script>
	<script src='/common/js/jquery-ui.custom.min.js'></script>
	<script src='/common/js/jquery.dcjqaccordion.2.7.js'></script>
	<script src='/common/js/bootstrap.min.js'></script>
	<script src='/common/js/facebook.js'></script>
	<script src='/common/js/navigation.js'></script>
	<script src='/board/js/breatheStory.js'></script>
	<!--<script src="/common/js/common-scripts.js"></script>-->
</body>
</html>
