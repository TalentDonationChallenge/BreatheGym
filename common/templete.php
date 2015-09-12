<?php
	require_once(__DIR__.'/../framework/framework.php');
	/* 헤드부분 function */
	function head ($title, $cssFiles) { ?>
	<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
	<meta charset='utf-8'>
	<title><?=$title?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
	<link rel='stylesheet' href='/common/css/bootstrap.min.css'>
	<div id="fb-root"></div>



	<?php
		if(isset($cssFiles)){
			foreach ($cssFiles as $cssFile): ?>
			<link rel='stylesheet' href='<?= $cssFile ?>' type='text/css' />
			<?php endforeach;
		}
	}
	/* 로그인창 부분 */
	function login() { ?>
		<div id='loginModal' class='modal' tabindex='-1' role='dialog' aria-hidden='true'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
						<h1 class='text-center'>Login</h1>
					</div>
					<div class='modal-body'>
						<form class='form col-md-12 center-block'>
							<div class='form-group'>
								<input type='text' class='form-control input-lg' placeholder='Email'>
							</div>
							<div class='form-group'>
								<input type='password' class='form-control input-lg' placeholder='Password'>
							</div>
							<div class='form-group'>
								<!--<button onClick="FB.login();" id="fbLogin" class='btn btn-primary btn-lg btn-block'>Facebook Sign In</button>-->
							</div>
							<div class='form-group'>
								<button id='facebookLogin' class='btn btn-primary btn-lg btn-block'>FacebookLogin</button>
								<!--<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>-->
								<button class='btn btn-primary btn-lg btn-block'>Sign In</button>
								<span class='pull-right'><a href='/register.php'>Register</a></span><span><a href='#'>Need help?</a></span>

							</div>

							<div id="status"></div>
						</form>


					</div>
					<div class='modal-footer'>
						<div class='col-md-12'>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
	/* 네비게이션 부분 */
	function navigation () { ?>
		<nav class='nav navbar-default navbar-inverse'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='/'>Breathe Gym</a>
				</div>

				<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					<ul class='nav navbar-nav'>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
							소개<span class='caret'></span>
						</a>
						<ul class='dropdown-menu'>
						<li><a href='/introduction/gym.php'>매장소개</a></li>
						<li><a href='#'>운동시간표</a></li>
						<li><a href='#'>스탭소개</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
							게시판<span class='caret'></span>
						</a>
						<ul class='dropdown-menu'>
						<li><a href='#'>브리드이야기</a></li>
						<li><a href='#'>사부님의 노트</a></li>
						<li><a href='#'>운동후기</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
							운동정보<span class='caret'></span>
						</a>
						<ul class='dropdown-menu'>
						<li><a href='#'>복싱자료실</a></li>
						<li><a href='#'>복싱운동강좌</a></li>
						<li><a href='#'>스파링영상</a></li>
						<li class='divider'></li>
						<li><a href='#'>크로스핏 자료실</a></li>
						<li><a href='#'>크로스핏 동작들</a></li>
						</ul>
					</li>
					<li><a href='/exercise/index.php'>운동관리</a></li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
							커뮤니티<span class='caret'></span>
						</a>
						<ul class='dropdown-menu'>
						<li><a href='/community/freeboard/index.php'>자유게시판</a></li>
						<li><a href='#'>상담</a></li>
						</ul>
					</li>
					</ul>
					<ul class='nav navbar-nav navbar-right'>
					<li><a href='/admin/index.php'>관리자메뉴</a></li>
					<li><a class='login' id='login' href='#'>로그인</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<?php }
	/* 관리자메뉴 header */
	function adminHeader() { ?>
		<header class='header black-bg'>
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars"></div>
			</div>
			<!--logo start-->
			<a href='/admin/index.php' class='logo'><b>관리자메뉴</b></a>
			<!--logo end-->
			<div class='top-menu'>
				<ul class='nav pull-right top-menu'>
				<li><a class="home" href="/"><i class="fa fa-home"></i></a></li>
				<li><a class='logout' href='/'>로그아웃</a></li>
				</ul>
			</div>
		</header>
	<?php }
	/* 관리자 sidebar */
	function adminSidebar($active) { ?>
		<aside>
			<div id='sidebar'  class='nav-collapse '>
			<!-- sidebar menu start-->
				<ul class='sidebar-menu' id='nav-accordion'>
				<li class='mt'>
					<a <?=$active==='index'?"class='active'":""?> href='/admin/index.php'>
						<i class='fa fa-dashboard'></i>
						<span>대쉬보드</span>
					</a>
				</li>

				<li class='sub-menu'>
					<a <?=$active==='member'?"class='active'":""?> href='#' >
						<i class='fa fa-desktop'></i>
						<span>회원관리</span>
					</a>
					<ul class="sub">
					<li><a href="/admin/member/index.php?type=web">웹페이지</a></li>
					<li><a href="/admin/member/index.php?type=1">1호점</a></li>
					<li><a href="/admin/member/index.php?type=2">2호점</a></li>
					</ul>
				</li>

				<li class='sub-menu'>
					<a <?=$active==='analysis'?"class='active'":""?> href='/admin/analysis/index.php' >
						<i class='fa fa-cogs'></i>
						<span>정보분석</span>
					</a>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='exercise'?"class='active'":""?> href='#' >
						<i class='fa fa-book'></i>
						<span>운동관리</span>
					</a>
					<ul class="sub">
					<li><a href="/admin/exercise/boxing/index.php">복싱</a></li>
					<li><a href="/admin/exercise/crossfit/index.php">크로스핏</a></li>
					</ul>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='record'?"class='active'":""?> href='#' >
						<i class='fa fa-pencil'></i>
						<span>기록관리</span>
					</a>
					<ul class="sub">
					<li><a href="/admin/record/index.php?no=1">1호점</a></li>
					<li><a href="/admin/record/index.php?no=2">2호점</a></li>
					</ul>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='consulting'?"class='active'":""?> href='/admin/consulting/index.php' >
						<i class='fa fa-tasks'></i>
						<span>상담</span>
					</a>
				</li>

				</ul>
			<!-- sidebar menu end-->
			</div>
		</aside>
	<?php }
	/* 운동관리 header */
	function memberHeader() { ?>
		<header class='header black-bg'>
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars"></div>
			</div>
			<!--logo start-->
			<a href='/exercise/index.php' class='logo'><b>운동기록관리</b></a>
			<!--logo end-->
			<div class='top-menu'>
				<ul class='nav pull-right top-menu'>
				<li><a class="home" href="/"><i class="fa fa-home"></i></a></li>
				<li><a class='logout' href='/'>로그아웃</a></li>
				</ul>
			</div>
		</header>
	<?php }
	/* 운동관리 sidebar */
	function memberSidebar($active) { ?>
		<aside>
			<div id='sidebar'  class='nav-collapse '>
			<!-- sidebar menu start-->
				<ul class='sidebar-menu' id='nav-accordion'>
				<li class='mt'>
					<a <?=$active==='index'?"class='active'":""?> href='/exercise/index.php'>
						<i class='fa fa-th-large'></i>
						<span>대쉬보드</span>
					</a>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='boxing'?"class='active'":""?> href='/exercise/boxing/index.php' >
						<i class='fa fa-bold'></i>
						<span>복싱</span>
					</a>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='crossfit'?"class='active'":""?> href='/exercise/crossfit/index.php' >
						<i class='fa fa-child'></i>
						<span>크로스핏</span>
					</a>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='mypage'?"class='active'":""?> href='/exercise/mypage/index.php' >
						<i class='fa fa-user'></i>
						<span>MyPage</span>
					</a>
				</li>

				</ul>
			<!-- sidebar menu end-->
			</div>
		</aside>
	<?php }

	// test

	/* 운동관리 header */
	function communityHeader() { ?>
		<header class='header black-bg'>
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars"></div>
			</div>
			<!--logo start-->
			<a href='/exercise/index.php' class='logo'><b>커뮤니티</b></a>
			<!--logo end-->
			<div class='top-menu'>
				<ul class='nav pull-right top-menu'>
				<li><a class="home" href="/"><i class="fa fa-home"></i></a></li>
				<li><a class='logout' href='/'>로그아웃</a></li>
				</ul>
			</div>
		</header>
	<?php }

	/* 운동관리 sidebar */
	function communitySidebar($active) { ?>
		<aside>
			<div id='sidebar'  class='nav-collapse '>
			<!-- sidebar menu start-->
				<ul class='sidebar-menu' id='nav-accordion'>
				<li class='mt'>
					<a <?=$active==='community/freeboard'?"class='active'":""?> href='/community/freeboard/index.php'>
						<i class='fa fa-pencil-square-o'></i>
						<span>자유게시판</span>
					</a>
				</li>
				<li class='sub-menu'>
					<a <?=$active==='boxing'?"class='active'":""?> href='#' >
						<i class='fa fa-question'></i>
						<span>상담</span>
					</a>
				</li>
				</ul>
			<!-- sidebar menu end-->
			</div>
		</aside>
	<?php }
	// test

	/* footer */
	/* 자바스크립트 */
	function scripts($jsFiles) { ?>
		<script src='/common/js/jquery-1.11.1.min.js'></script>
		<script src='/common/js/bootstrap.min.js'></script>
		<script src='/common/js/facebook.js'></script>
		<?php
		if(isset($jsFiles)){
			foreach ($jsFiles as $jsFile): ?>
			<script src='<?= $jsFile ?>'></script>
			<?php endforeach;
		}
	}
?>
