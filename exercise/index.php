<?php
	require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏-회원운동기록관리',
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
	<?php memberHeader();
	memberSidebar("index");
	//로그인 했다고 가정하기
	$_SESSION['login'] = true;
	$_SESSION['gymMember'] = true;
	$_SESSION['barcode'] = 'ddu12h3q';
	$barcode = $_SESSION['barcode'];
	$progress = MemberBoxingManage::getBoxingProgress($barcode);
	?>
	<!--maincontent start-->
	<section id = "main-content">
		<section class = "wrapper">
			<div class = "col-lg-12 mt">
				<div class = "row">
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>크로스핏 순위</h5>
							</div>
							<h1><i class="fa fa-line-chart icon"></i></h1>
							<h3>상위 %</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>복싱 진도</h5>
							</div>
							<h1><i class="fa fa-server icon"></i></h1>
							<h3><?=$progress['name']?></h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>연속출석일</h5>
							</div>
							<h1><i class="fa fa-trophy icon"></i></h1>
							<h3>5일</h3>
						</div>
					</div>
					<div class = "col-md-3 col-sm-6 mb">
						<div class="white-panel pn">
							<div class = "white-header">
								<h5>마감일</h5>
							</div>
							<h1><i class="fa fa-calendar icon"></i></h1>
							<h3><?=UserExerciseInfo::getDurationDate($barcode)?></h3>
						</div>
					</div>
				</div>
			</div>
			<div class = "col-lg-12">
				<div class="row">
					<!--복싱진도가 보일 부분 start-->
					<div class = "col-sm-6 mb">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>오늘의 복싱 진도</h5>
							</div>
							<div class="img-wrap">
								<img src = "/exercise/img/boxing.jpg">
							</div>
							<div class ="progress">
							<?php
							$progressList = MemberBoxingManage::getBoxingProgressList($progress['no']);
							$hidden = count($progressList)<3?0:count($progressList)-2;
							$i = 0;
							foreach ($progressList as $progressElem) { ?>
								<div class='progress-bar progress-bar-<?=$progressElem["color"]?> <?=
								$i>=$hidden?"":"visible-lg"?>'>
									<span><?=$progressElem['name']?></span>
								</div>
							<?php
								$i++;
							} ?>
							</div>
						</div>
					</div>
					<!--복싱진도가 보일 부분 end -->
					<!--크로스핏 부분 start -->
					<div class = "col-sm-6">
						<div class="darkblue-panel pn">
							<div class="darkblue-header">
								<h5>오늘의 크로스핏</h5>
							</div>
							<div class="img-wrap">
								<img src = "/exercise/img/crossfit.jpg">
							</div>
							<h5>오늘 회원님은 상위 %의 기록을 달성하였습니다.</h5>
						</div>
					</div>
					<!--크로스핏 부분 end -->
				</div>
			</div>
		</section>
		<!--maincontent end-->

	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/common-scripts.js"></script>

</body>
</html>
