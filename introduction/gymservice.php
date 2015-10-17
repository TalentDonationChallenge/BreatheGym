<?php
require_once(__DIR__.'/../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 매장소개',
	array('/common/css/navigation.css', 'css/introduction.css')); ?>
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
	<div class="container introduce">
		<div class="row">
			<div class='col-md-2 col-xs-12 sidebar'>
				
					<h3>BreatheGym 소개</h3>
				
				<ul class='row list-unstyled introduceList'>
					<a href='gym.php'><li class='col-md-12 col-xs-4'>
						+ 매장소개
					</li></a>
					<a href='gymservice.php?no=1'>
					<li class='col-md-12 col-xs-4 listActive'>
						+ 이용시간
					</li></a>
					<?php
						if($_GET['no']=='1'){?>
							<a href='gymservice.php?no=1'><li class='col-md-12 col-xs-4 listActive'>1호점</li></a>
							<a href='gymservice.php?no=2'><li class='col-md-12 col-xs-4'>2호점</li></a>
						<?php
						} else if($_GET['no']=='2'){?>
							<a href='gymservice.php?no=1'><li class='col-md-12 col-xs-4'>1호점</li></a>
							<a href='gymservice.php?no=2'><li class='col-md-12 col-xs-4 listActive'>2호점</li></a>
					<?php
						}
					?>
					
					<a href='gymstaff.php'>
					<li class='col-md-12 col-xs-4'>
						+ 스탭소개
					</li>
					</a>
				</ul>
			</div>
			<div class='col-md-10 col-xs-12 '>
				<?php
				if($_GET['no']=='1'){?>
					<img src='images/gym1st-service.jpg' width='100%'/>
				<?php
				} else if($_GET['no']=='2'){?>
					<img src='images/gym2nd-service.jpg' width='100%'/>
				<?php
				}
				?>
			</div>
			
		</div>
		
		
	</div><!-- /.container -->
	<footer class='grayBackground'>
		<div class='row contents'>
			<div class='col-md-offset-1 col-md-2 col-xs-12'>
				<img src = "/resources/teambreathelogo.png"/>
			</div>
			<div class='col-md-8 col-xs-12'>
				<br>
				<p>브리드 복싱 짐 &amp; 크로스핏</p>
				<p>BreatheGym.com은 Team Breathe, Inc의 소유입니다.</p>
				<p>Copyright © 2015 Breathe Boxing Gym &amp; Crossfit. All rights reserved.</p>
				<p class='pull-right'><a href='#'>Back to top</a></p>
			</div>
		</div>
	</footer>
	<!-- script references -->
	<?php scripts(array('/common/js/navigation.js','js/introduction.js')) ?>
</body>
</html>
