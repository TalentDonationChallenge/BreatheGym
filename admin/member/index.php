<?php
require_once(__DIR__.'/../../framework/framework.php');
if(isset($_GET['type'])){
		if($_GET['type']==='1'||$_GET['type']==='2') { //몇호점인지 찾기
			$branch = $_GET['type'];
			$filter['branch']=$branch;
			$web=false;
		} else if($_GET['type']==='web'){
			$web=true;
			$filter=false;
		} else {
			// 에러로 보내버리기
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
			array('/common/font-awesome/css/font-awesome.css',
				'/common/css/style.css','/common/css/style-responsive.css',
				'/common/css/table-responsive.css', '/admin/css/member.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--header start-->
	<?php adminHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php adminSidebar("member"); ?>
	<!--sidebar end-->
	<section id="main-content" type='<?=$web?"web":$branch?>'>
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 회원목록 (<?=$web?'웹페이지':$branch.'호점'?>)</h3>
			<div class="row">
				<div class="col-lg-12 mt">
					<div class="panel panel-default">
						<div class="panel-body table-panel">
							<button class="btn btn-default mt mb" name="button">
								<i class="fa fa-check-square-o"></i><span> 전체선택</span>
							</button>
							<div class="form-inline pull-right mt mb">
								<select class="form-control">
									<?=$web?'<option>이메일</option>':'<option>바코드</option>'?>
									<option>이름</option>
								</select>
								<input type="text" class="form-control">
								<button class="btn btn-primary" name="button">
									<i class="fa fa-search"></i><span> 검색</span>
								</button>
							</div>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<?php if($web) { ?>
										<th>이메일</th>
										<th class="hidden-phone">닉네임</th>
										<th class="hidden-phone">이름</th>
										<th class="hidden-phone">성별</th>
										<th class="hidden-phone">가입일</th>
										<?php } else { ?>
										<th>이름</th>
										<th class="hidden-phone">전화번호</th>
										<th class="hidden-phone">마감일</th>
										<th class="hidden-phone">회원코드</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
								<?php //가독성 구려서 미안해요 ㅠㅠ
								$members = $web?MemberManagemant::getPageMembers($filter):
								MemberManagemant::getGymMembers($filter);
								foreach ($members as $member) { ?>
								<tr>
									<?php if($web) { ?>
									<td><input type="checkbox"></td>
									<td><a href='profile.php?type=page&amp;email=<?=$member["email"]?>'>
										<?=$member['email']?>
									</a></td>
									<td class="hidden-phone"><?=$member['nickname']?></td>
									<td class="hidden-phone"><?=$member['name']?></td>
									<td class="hidden-phone"><?=$member['sex']?></td>
									<td class="hidden-phone"><?=$member['registerDate']?></td>
									<?php } else {?>
									<td><input type="checkbox"></td>
									<td><a href='profile.php?type=gym&amp;barcode=<?=$member['barcode']?>'>
										<?=$member['name']?>
									</a></td>
									<td class="hidden-phone"><?=$member['phone']?></td>
									<td class="hidden-phone"><?=$member['durationDate']?></td>
									<td class="hidden-phone"><?=$member['barcode']?></td>
									<?php } ?>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<?php if ($web) { ?>

						<div class="btn-group ml">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="button">
								상태변경<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">관리자</a></li>
								<li><a href="#">일반 회원</a></li>
								<li class="divider"></li>
								<li><a href="#">강퇴</a></li>
							</ul>
						</div>

						<?php } else { ?>
						<button class="btn btn-primary pull-right" name="button">추가</button>
						<button class="btn btn-success" name="button">SMS</button>
						<div class="btn-group ml">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="button">
								상태변경<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">활성</a></li>
								<li><a href="#">비활성</a></li>
								<li class="divider"></li>
								<li><a href="#">강퇴</a></li>
							</ul>
						</div>
						<button class="btn btn-warning hidden-xs ml" name="button">엑셀</button>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<script src="/common/js/jquery-1.11.1.min.js"></script>
<script src="/common/js/bootstrap.min.js"></script>
<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/common/js/common-scripts.js"></script>
</body>
</html>
