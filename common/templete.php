<?php
	require_once(__DIR__.'/../framework/framework.php');

	/* 헤드부분 function */
	function head ($title, $cssFiles) { ?>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?=$title?></title>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="/common/css/bootstrap.min.css">
	<link rel="stylesheet" href="/common/css/navigation.css">
	<?php 
		if(isset($cssFiles)){
			foreach ($cssFiles as $cssFile): ?>
			<link rel="stylesheet" href="<?= $cssFile ?>" type="text/css" />
			<?php endforeach;
		} 
	}
	/* 로그인창 부분 */
	function login() { ?>
		<div id="loginModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h1 class="text-center">Login</h1>
					</div>
					<div class="modal-body">
						<form class="form col-md-12 center-block">
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-lg btn-block">Sign In</button>
								<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<div class="col-md-12">
						</div>  
					</div>
				</div>
			</div>
		</div>
	<?php }
	/* 네비게이션 부분 */
	function navigation () { ?>
		<nav class="nav navbar-default navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Breathe Gym</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							소개<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						<li><a href="introduction.html">매장소개</a></li>
						<li><a href="#">운동시간표</a></li>
						<li><a href="#">스탭소개</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							게시판<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						<li><a href="#">브리드이야기</a></li>
						<li><a href="#">사부님의 노트</a></li>
						<li><a href="#">운동후기</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							운동정보<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						<li><a href="#">복싱자료실</a></li>
						<li><a href="#">복싱운동강좌</a></li>
						<li><a href="#">스파링영상</a></li>
						<li class="divider"></li>
						<li><a href="#">크로스핏 자료실</a></li>
						<li><a href="#">크로스핏 동작들</a></li>
						</ul>
					</li>
					<li><a href="#">운동관리</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							커뮤니티<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						<li><a href="#">자유게시판</a></li>
						<li><a href="#">상담</a></li>
						</ul>
					</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="admin/index.html">관리자메뉴</a></li>
					<li><a class="login" href="#">로그인</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<?php } 
	/* footer */
	/* 자바스크립트 */
	function scripts($jsFiles) { ?>
		<script src="/common/js/jquery-1.11.1.min.js"></script>
		<script src="/common/js/bootstrap.min.js"></script>
		<script src="/common/js/navigation.js"></script>
		<?php 
		if(isset($jsFiles)){
			foreach ($jsFiles as $jsFile): ?>
			<script src="<?= $jsFile ?>"></script>
			<?php endforeach;
		}
	}
?>