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
		<h1>> Breathe Diary<a href='./board/breatheBoard/index.php' class = 'btn btn-primary pull-right'>view details</a></h1>
		<!-- START THE FEATURETTES -->
		<br/>
		<div class='container mediaBox'>
			<?php
				$breatheBoard=new ImageBoard('breatheBoard');
				$posts = $breatheBoard->loadPostList(1,5);
				if (empty($posts)) { ?>
					<div class='media'>
						<div class='media-body'>
							등록된 게시글이 없습니다
						</div>
					</div>
				<?php } else {
						foreach($posts as $post) {
							$images = $breatheBoard->loadImages($post['no']); ?>
							<div class='media'>
								<div class='media-left'>
									<a href='#'>
										<img class="img-rounded" src='<?=empty($images)?"/resources/crossfit.jpg":"/board/breatheBoard/upload/files/".$images[0]['fileName']?>' height="100%"/>
									</a>
								</div>

								<div class='media-body'>
									<h4 class='media-heading'><?=$post['title']?></h4>
									<?=$post['content']?>
								</div>
							</div>
							<?php }
						} ?>
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
					<div class='col-md-12 col-xs-12 gallery galleryBox first'>
						<img class='img-rounded galleryImage first' src='./resources/note_2.jpg' alt='...'/>
						<a href='/board/diaryBoard/index.php'>
							<div class='gradientImage first'>
								싸부님의 노트
							</div>
						</a>
					</div>

				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/fitness_2.jpg' alt='...'/>
						<a href='/exerciseInfo/crossfitLecture/index.php'>
							<div class='gradientImage'>
								크로스핏 강좌 - 플랭크
							</div>
						</a>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/man.jpg' alt='.../'/>
						<a href = '/board/review/index.php'>
							<div class='gradientImage'>
								운동후기<br/>
								나는 나와의 싸움에서<br/>
								승리하고 싶다 - 허 재
							</div>
						</a>
					</div>
				</div>
				<div class='col-md-3 col-xs-6'>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/boxing_2.jpg' alt='...'/>
						<a href='/exerciseInfo/crossfitLecture/index.php'>
							<div class='gradientImage'>
								복싱 강좌 - 4. 원투 스트레이트
							</div>
						</a>
					</div>
					<div class='col-md-12 col-xs-12 gallery galleryBox'>
						<img class='img-rounded galleryImage' src='./resources/breathecafe.png' alt='.../'/>
						<a href='http://cafe.naver.com/breathegym'>
							<div class='gradientImage'>
								BreatheGym <네이버 공식 까페><br/>
								유익한 정보와 소식들!
							</div>
						</a>
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
						<img class='img-rounded galleryImage' src='./resources/breatheblog.png' alt='.../'/>
						<a href='http://blog.naver.com/jinhee465'>
							<div class='gradientImage'>
								브리드짐의 모든 소식들을<br/>
								<브리드짐 공식 블로그!!>에서
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- /END THE FEATURETTES -->
	<footer class="grayBackground">
	<div class="container">
		<div class='row'>
			<div class='col-md-3 col-xs-12'>
				<img class="mr" src = "/resources/teambreathelogo.png"/>
			</div>
			<div class='col-md-offset-1 col-md-5 col-xs-12'>
				<br>
				<p>브리드 복싱 짐 &amp; 크로스핏</p>
				<p>BreatheGym.com은 Team Breathe, Inc의 소유입니다.</p>
				<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
			</div>
			<p class='pull-right col-md-2'><a href='#'>Back to top</a></p>
		</div>
		</div>
	</footer>
	<?php scripts(array('/common/js/navigation.js')) ?>
</body>
</html>
