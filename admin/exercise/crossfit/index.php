<?php
	require_once(__DIR__.'/../../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css',
		'../../css/fullcalendar.css',
		'../../css/exercise.css'));?>
	<!--[if lt IE 9]>
	<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
	<script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
	<![endif]-->
</head>
<body>
	<!--header start-->
	<?php adminHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php adminSidebar('exercise'); ?>
	<!--sidebar end-->
	<!-- Main content start -->
	<section id='main-content'>
		<section class='wrapper'>
			<h3><i class='fa fa-angle-right'></i> 크로스핏</h3>
			<!-- page start-->
			<div class='row mt'>
				<aside class='col-lg-3 mt'>
					<h4><i class='fa fa-angle-right'></i> 운동종류</h4>
					<div id='add-exercise-form'>
						<div class='input-group'>
							<input id='exercise-name' type='text' class='form-control' placeholder='운동이름'>
							<span class='input-group-btn'>
								<button class='btn btn-default btn-insert'>추가</button>
							</span>
						</div>
						<div id='exercise-spec' class='hidden'>
							<div class='radio-group'>
								<label class='radio-inline'>
									<input type='radio' name='exercise-type' value='time' checked>
									시간
								</label>
								<label class='radio-inline'>
									<input type='radio' name='exercise-type' value='count'>
									횟수
								</label>
							</div>
							<div class='form-inline' id='time-spec'>
								<div class='form-group'>
									<input type='number' class='form-control' min='0' max='59' id='minute'>
									<label class='control-label' for='minute'>분</label>
								</div>
								<div class='form-group'>
									<input type='number' class='form-control' min='0' max='59' id='second'>
									<label class='control-label' for='second'>초</label>
								</div>
							</div>
							<div class='form-inline hidden' id='count-spec'>
								<div class='form-group'>
									<input type='number' class='form-control' min='0' max='1000' id='count'>
									<label for='count'>회</label>
								</div>
							</div>
							<div class='form-group'>
								<label for='memo'>메모</label>
								<textarea class='form-control' name='memo' rows='3' id='memo'></textarea>
							</div>
						</div>
						<div class='alert alert-danger'></div>
					</div>
					<div class='exercise-info-view hidden' no=''>
						<h4></h4>
						<p class='type'></p>
						<p class='time'></p>
						<p class='count'></p>
						<p class='memo'></p>
						<button type="button" class="btn btn-default edit">
							<i class="fa fa-pencil-square-o"></i> 수정
						</button>
						<button type="button" class="btn btn-danger delete">
							<i class="fa fa-trash-o"></i> 삭제
						</button>
					</div>
				</aside>
				<aside class='col-lg-9 mt'>
					<section class='panel'>
						<div class='panel-body'>
							<div id='calendar' class='has-toolbar'></div>
						</div>
					</section>
				</aside>
			</div><!-- page end-->
		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

	<script src='/common/js/jquery-1.11.1.min.js'></script>
	<script src='/common/js/bootstrap.min.js'></script>
	<script src='../../js/jquery.dcjqaccordion.2.7.js'></script>
	<script src='../../js/jquery-ui.custom.min.js'></script>
	<script src='../../js/moment.min.js'></script>
	<script src='../../js/fullcalendar.js'></script>
	<script src='../../js/ko.js'></script>
	<script src='../../js/common-scripts.js'></script>
	<script src='../../js/calendar-conf-events.js'></script>
</body>
</html>
