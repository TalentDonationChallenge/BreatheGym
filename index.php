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
		sessionLogin();
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
			<div class='col-md-7'>
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
			<div class='col-md-5 text-center'>
				<div class="fb-page" data-height="300px" data-width="100%" data-href="https://www.facebook.com/%EB%B8%8C%EB%A6%AC%EB%93%9C%EB%B3%B5%EC%8B%B1-680392418649439/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
					<div class="fb-xfbml-parse-ignore">
						<blockquote cite="https://www.facebook.com/%EB%B8%8C%EB%A6%AC%EB%93%9C%EB%B3%B5%EC%8B%B1-680392418649439/">
							<a href="https://www.facebook.com/facebook">Facebook</a>
						</blockquote>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
		<br/>
		<br/>
		<h1>> Breathe Story<small class='pull-right'><a href="./board/breatheBoard/index.php">View details>></a></small></h1>
		<!-- START THE FEATURETTES -->
		<br/>
		<div class='container mediaBox'>
			<?php
<<<<<<< HEAD
				$pdo
			?>
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
=======
				$diaryboard=new ImageBoard('diaryBoard');
				$posts = $diaryboard->loadPostList(1);
				if (empty($posts)) { ?>
					<div class='media'>
						<div class='media-body'>
							등록된 게시글이 없습니다
						</div>
					</div>
				<?php } else {
						foreach($posts as $post) { ?>
							<div class='media'>
								<div class='media-left'>
									<a href='#'>
										<img class='img-rounded' src='http://placehold.it/140x140' alt='...'/>
									</a>
								</div>
>>>>>>> 53604010d06b6e87b977b1b470662d5302a080e3

								<div class='media-body'>
									<h4 class='media-heading'><?=$post['title']?></h4>
									<?=$post['content']?>
								</div>
							</div>
							<?php } } ?>
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
