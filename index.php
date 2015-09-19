<?php
	require_once(__DIR__.'/framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏', array('/common/css/navigation.css','/common/css/index.css')); ?>
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
	<img class='logo' src='./resources/teambreathelogo.png'/>
	<div id='myCarousel' class='carousel slide'>
		<!-- Indicators -->
		<ol class='carousel-indicators'>
			<li data-target='#myCarousel' data-slide-to='0' class='active'></li>
			<li data-target='#myCarousel' data-slide-to='1'></li>
			<li data-target='#myCarousel' data-slide-to='2'></li>
		</ol>
		<div class='carousel-inner'>
			<div class='item active'>
				<img src='./resources/boxing-gloves.jpg' width='100%' class='img-responsive'>
				
				<div class='container'>
					<div class='carousel-caption'>
						<h1>BREATHE BOXING GYM &amp; CROSSFIT</h1>
						<p></p>
						<p><a class='btn btn-lg btn-primary' href='./introduction/gym.php'>Learn More</a></p>
						<br>
					</div>
				</div>
			</div>
			<div class='item'>
				<img src='./resources/cats.jpg' class='img-responsive' width='100%'>
				<div class='container'>
					<div class='carousel-caption'>
						<h1>Fitness / Boxing / Crossfit</h1>
						<p></p>
						<br>
					</div>
				</div>
			</div>
			<div class='item'>
				<img src='./resources/Breathe.png' class='img-responsive' width='100%'>
				<div class='container'>
					<div class='carousel-caption'>

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
		<h1> > Today Ranking</h1>
		<div class='row'>
			<div class='col-md-5'>
				<h2>Ranking<small class='pull-right'>View details >></small></h2>
				<table class='table table-hover'>
					<thead>
						<td>#</td>
						<td>이름</td>
						<td>운동종목</td>
						<td>기록</td>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>심종규</td>
							<td>데드리프트</td>
							<td>45</td>
						</tr>
						<tr>
							<td>2</td>
							<td>차진욱</td>
							<td>데드리프트</td>
							<td>39</td>
						</tr>
						<tr>
							<td>3</td>
							<td>나익채</td>
							<td>데드리프트</td>
							<td>30</td>
						</tr>
					</tbody>
				</table>
				
			</div>
			<div class='col-md-7 text-center'>
				<img class='img-circle' src='http://placehold.it/140x140'>
				<h2>오늘의 챔피언!</h2>
				<p>축하합니다! 계속해서 분발해주세요!</p>
			</div>
		</div><!-- /.row -->
		<br/>
		<br/>
		<h1>> Breathe Diary<small class='pull-right'>View details>></small></h1>
		<!-- START THE FEATURETTES -->
		<br/>
		<div class='container mediaBox'>
			
			<div class='media'>
				<div class='media-left'>
					<a href='#'>
						<img class='img-rounded' src='http://placehold.it/140x140' alt='...'/>
					</a>
				</div>

				<div class='media-body'>
					<h4 class='media-heading'>브리드짐 제 5회 정기 모임!</h4>
					브리드짐 제 5회 정기 오프라인 모임이 머스커비에서 있었습니다. 운동은 열심히!
					놀 때는 누구보다 즐겁게 노는 브리드짐 가족들! 앞으로도 열심히 해서 건강한
					생활 하도록 해요~
				</div>
			</div>
			<div class='media'>
				<div class='media-left'>
					<a href='#'>
						<img class='img-rounded' src='http://placehold.it/140x140' alt='...'/>
					</a>
				</div>

				<div class='media-body'>
					<h4 class='media-heading'>오프라인 스파링데이</h4>
					치열한 예선 전을 거치고 결승전까지 올라온 두 선수! 차진욱 VS 허재!!
					두 선수의 불꽃 튀기는 마지막 승부를 브리드짐 2호점에서 확인하세요!
					오는 23일 저녁 6시에 시작되는 경기를 놓치지 마세요~:)
				</div>
			</div>
			<div class='media'>
				<div class='media-left'>
					<a href='#'>
						<img class='img-rounded' src='http://placehold.it/140x140' alt='...'/>
					</a>
				</div>

				<div class='media-body'>
					<h4 class='media-heading'>상반기 버피테스트 100</h4>
					상반기 버피테스트 100이 이번 수요일에 진행되었습니다. 이번에는 반드시
					저번보다 좋은 성적을 얻겠다는 가족들의 뜨거운 의지가 여기까지 전해졌는데요.
					그동안의 노력의 성과가 있었기를 기대하면서~ 모두의 성적과 랭킹을
					공개합니다!
				</div>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
	</div><!-- /.container -->
	<div class='gradientBackground' style='height : 100px'></div>
	<div class='people grayBackground'>
		<div class='container gallery'>
			<h1>> Breathe Gallery</h1>
			<div class='row gallery'>
				<div class='col-md-3 col-xs-6 gallery'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/crossfit.jpg' alt='...'/>
						<div class='gradientImage'>
							크로스핏의 효과와 장점
						</div>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/man.jpg' alt='.../'/>
						<div class='gradientImage'>
							어깨 근육 발달에<br/>
							좋은 운동!
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/crossfit.jpg' alt='...'/>
						<div class='gradientImage'>
							싸부님의 다이어리
						</div>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/man.jpg' alt='.../'/>
						<div class='gradientImage'>
							오늘의 크로스핏 강좌
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/crossfit.jpg' alt='...'/>
						<div class='gradientImage'>
							오늘의 복싱 강좌
						</div>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/man.jpg' alt='.../'/>
						<div class='gradientImage'>
							어깨 근육 발달에<br/>
							좋은 운동!
						</div>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/crossfit.jpg' alt='...'/>
						<div class='gradientImage'>
							크로스핏의 효과와 장점
						</div>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/man.jpg' alt='.../'/>
						<div class='gradientImage'>
							어깨 근육 발달에<br/>
							좋은 운동!
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- /END THE FEATURETTES -->
	<div class='people grayBackground'>
		<!-- FOOTER -->
		<footer class='container'>
			<img src = "./resources/teambreathelogo.png" class='pull-left'/>
			<p>브리드 복싱 짐 &amp; 크로스핏</p>
			<p>1호점 : 경기도 안산시 어쩌구저쩌구</p>
			<p>2호점 : 경기도 안산시 상록구 어쩌구</p>
			<p class='pull-right'><a href='#'>Back to top</a></p>
			<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
		</footer>
	</div>
	<?php scripts(array('/common/js/navigation.js')) ?>
</body>
</html>