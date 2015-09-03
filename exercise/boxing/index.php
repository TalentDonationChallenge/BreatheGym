<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 회원운동기록관리',
		array('/common/font-awesome/css/font-awesome.css',
			'/common/css/style.css',
			'/common/css/style-responsive.css',
			'/exercise/css/exercise.css'
			));?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!--header start-->
	<?php memberHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("boxing");
	$barcode = $_SESSION['barcode'];
	$progress = MemberBoxingManage::getBoxingProgress($barcode);
	$boxingInfo = MemberBoxingManage::getBoxingInfo($progress['no']);
	?>
	<!--sidebar end-->
	<section id = "main-content">
		<section class = "wrapper">
			<div class = "col-lg-12 mt">
				<div class="showback">
				<h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
				<div class ="progress">
				<?php
				$progressList = MemberBoxingManage::getBoxingProgressList($progress['no']);
				foreach ($progressList as $progressElem) { ?>
					<div class='progress-bar progress-bar-<?=$progressElem["color"]?>'>
						<span><?=$progressElem['name']?></span>
					</div>
				<?php } ?>
				</div>
				<h2><?=$progress['name']?></h2>
				<!-- 16:9 동영상 -->
				<div class="col-md-6">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src='<?=$boxingInfo["youtubeSrc"]?>'></iframe>
					</div>
				</div>
				<div class="col-md-6">
					<h2>연습방법</h2>
					<p><?=$boxingInfo['description']?></p> <!-- 이부분 텍스트 처리 필요 -->
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class = "showback">
				<h4><i class = "fa fa-angle-right"></i> 이전 내 진도</h4>
				<?php if($progress['no']>=0) {
					$past = MemberBoxingManage::getBoxingInfo($progress['no']-1);
				} ?>
				<p><?=$progress['no']==0?'이전 진도 없음':$past["name"]?></p>
				<img src="/exercise/img/boxingimg.jpg">
			</div>
		</div>
		<div class="col-md-6">
			<div class = "showback">
				<h4><i class = "fa fa-angle-right"></i> 다음 진도</h4>
				<?php if($progress['no']<4) { // 진도가 총 몇개일까요...
					$next = MemberBoxingManage::getBoxingInfo($progress['no']+1);
				} ?>
				<p><?=$progress['no']==4?'다음 진도 없음':$next["name"]?></p>
				<img src="/exercise/img/boxingimg.jpg">
			</div>
		</div>
		</section>
	</section>
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<script src="/common/js/common-scripts.js"></script>


</body>
</html>
