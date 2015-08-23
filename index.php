<?php
	require_once(__DIR__.'/framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏', array('/common/css/navigation.css')); ?>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<script src="/common/js/facebook.js"></script>

	<!-- 페이스북 SDK load -->
	<?php
		login();
		navigation();
	?>
	<!-- Carousel
	================================================== -->
	<div id='myCarousel' class='carousel slide'>
		<!-- Indicators -->
		<ol class='carousel-indicators'>
			<li data-target='#myCarousel' data-slide-to='0' class='active'></li>
			<li data-target='#myCarousel' data-slide-to='1'></li>
			<li data-target='#myCarousel' data-slide-to='2'></li>
		</ol>
		<div class='carousel-inner'>
			<div class='item active'>
				<img src='/assets/example/bg_suburb.jpg' style='width:100%' class='img-responsive'>
				<div class='container'>
					<div class='carousel-caption'>
						<h1>BREATHE BOXING GYM &amp; CROSSFIT</h1>
						<p></p>
						<p><a class='btn btn-lg btn-primary' href='http://getbootstrap.com'>Learn More</a></p>
						<br>
					</div>
				</div>
			</div>
			<div class='item'>
				<img src='main_boxing.jpg' class='img-responsive'>
				<div class='container'>
					<div class='carousel-caption'>
						<h1>Boxing</h1>
						<p>복싱은 헝그리!</p>
						<p></p>
						<br>
					</div>
				</div>
			</div>
			<div class='item'>
				<img src='main_crossfit.jpg' class='img-responsive'>
				<div class='container'>
					<div class='carousel-caption'>
						<h1>Crossfit</h1>
						<p>크로스핏은 힘들어!</p>
						<p></p>
						<br>
					</div>
				</div>
			</div>
		</div>
		<!-- Controls -->
		<a class='left carousel-control' href='#myCarousel' data-slide='prev'>
			<span class='icon-prev'></span>
		</a>
		<a class='right carousel-control' href='#myCarousel' data-slide='next'>
			<span class='icon-next'></span>
		</a>
	</div>
	<!-- /.carousel -->


	<!-- Marketing messaging and featurettes
	================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class='container marketing'>

		<!-- Three columns of text below the carousel -->
		<div class='row'>
			<div class='col-md-4 text-center'>
				<img class='' src='http://placehold.it/140x140'>
				<h2>브리드짐소개</h2>
				<p>이러쿵저러쿵 이러쿵저러쿵</p>
				<p><a class='btn btn-default' href='#'>View details »</a></p>
			</div>
			<div class='col-md-8 text-center'>
				<img class='img-circle' src='http://placehold.it/140x140'>
				<h2>오늘의 운동왕!</h2>
				<p>뭐 넣어야 할지 몰라서 그냥 넣어본거니까 크게 신경쓰지 말아요 헤헤</p>
				<p><a class='btn btn-default' href='#'>View details »</a></p>
			</div>
		</div><!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr class='featurette-divider'>

		<div class='featurette'>
			<h2 class='featurette-heading'>다이어트해야하는데 <span class='text-muted'>밥을 굶기도 싫다면?</span></h2>
			<p class='lead'>운동까지 하기싫으니까 그냥 다이어트는 안될 것 같다 ㅠㅠ 졸리네 자러가고싶다 </p>
		</div>

		<hr class='featurette-divider'>

		<!-- /END THE FEATURETTES -->


		<!-- FOOTER -->
		<footer>
			<p>브리드 복싱 짐 &amp; 크로스핏</p>
			<p>1호점 : 경기도 안산시 어쩌구저쩌구</p>
			<p>2호점 : 경기도 안산시 상록구 어쩌구</p>
			<p class='pull-right'><a href='#'>Back to top</a></p>
			<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
		</footer>

	</div><!-- /.container -->
	<?php scripts(array('/common/js/navigation.js')) ?>
</body>
</html>
