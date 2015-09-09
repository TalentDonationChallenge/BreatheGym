<?php
	require_once(__DIR__.'/../../framework/framework.php');
	if (isset($_GET['no'])&&($_GET['no']==='1'||$_GET['no']==='2')) { //몇호점인지 찾기
		$branch = $_GET['no'];
	} else {
		//에러로 보내버리기
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
	<?php adminSidebar("member");
	if (isset($_GET['type'])) {
		$web = false;
		if(($_GET['type']==='gym')&&(isset($_GET['barcode']))){
			$barcode = $_GET['barcode'];
			$profile = MemberManagemant::getGymMemberInfo($barcode);
		} else if (($_GET['type']==='page')&&(isset($_GET['email']))) {
			$web = true;
			$email = $_GET['email'];
			$profile = MemberManagemant::getPageMemberInfo($email);
			print_r($profile);
		} else {
			//에러닷
		}
	} else {
		$web = false;
		//에러닷
	} ?>
	<!--sidebar end-->
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 회원 프로필</h3>
			<div class="col-lg-12 mt">
                <div class="content-panel mb">
                    <img class="profile-pic" src="." alt=""/>
					<div class="profile-info">
						<table class="table">
							<tbody>
								<?php if ($web) { ?>
									<tr>
										<td>이름</td>
										<td><?=$profile['name']?></td>
										<td class="hidden-xs">이메일</td>
										<td class="hidden-xs"><?=$profile['email']?></td>
									</tr>
									<tr class="visible-xs">
										<td>이메일</td>
										<td><?=$profile['email']?></td>
									</tr>
									<tr>
										<td>성별</td>
										<td><?=$profile['sex']?></td>
										<td class="hidden-xs">닉네임</td>
										<td class="hidden-xs"><?=$profile['nickname']?></td>
									</tr>
									<tr class="visible-xs">
										<td>닉네임</td>
										<td><?=$profile['nickname']?></td>
									</tr>
									<tr>
										<td>가입일</td>
										<td><?=$profile['registerDate']?></td>
										<td class="hidden-xs">바코드</td>
										<td class="hidden-xs"><?=$profile['barcode']?></td>
									</tr>
									<tr class="visible-xs">
										<td>바코드</td>
										<td><?=$profile['barcode']?></td>
									</tr>
								<?php } else { ?>
									<tr>
										<td>이름</td>
										<td><?=$profile['name']?></td>
										<td class="hidden-xs">생년월일</td>
										<td class="hidden-xs"><?=$profile['birthday']?></td>
									</tr>
									<tr class="visible-xs">
										<td>생년월일</td>
										<td><?=$profile['birthday']?></td>
									</tr>
									<tr>
										<td>성별</td>
										<td><?=$profile['sex']?></td>
										<td class="hidden-xs">신장</td>
										<td class="hidden-xs"><?=$profile['height']?></td>
									</tr>
									<tr class="visible-xs">
										<td>신장</td>
										<td><?=$profile['height']?></td>
									</tr>
									<tr>
										<td>등록일</td>
										<td><?=$profile['registerDate']?></td>
										<td class="hidden-xs">전화번호</td>
										<td class="hidden-xs"><?=$profile['phone']?></td>
									</tr>
									<tr class="visible-xs">
										<td>전화번호</td>
										<td><?=$profile['phone']?></td>
									</tr>
									<tr>
										<td>만료일</td>
										<td><?=$profile['durationDate']?></td>
										<td class="hidden-xs">체중</td>
										<td class="hidden-xs"><?=$profile['weight']?></td>
									</tr>
									<tr class="visible-xs">
										<td>체중</td>
										<td><?=$profile['weight']?></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
                </div>
				<button class="btn btn-default pull-right" name="button">
					<?php if ($web){ ?>
						<a href='index.php?type=web'>
					<?php } else{ ?>
						<a href='index.php?type=<?=$_GET["type"]==="gym"?$profile["branch"]:"page"?>'>
					<?php } ?>
						<i class="fa fa-list"></i><span class="hidden-xs"> 회원목록</span>
					</a>
				</button>
				<?php if(isset($barcode)) { ?>
                <button class="btn btn-primary hidden-xs" name="button">바코드 재발급</button>
				<button class="btn btn-success ml" name="button">
					<i class="fa fa-edit"></i><span class="hidden-xs"> 정보수정</span>
				</button>
				<?php } ?>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
</body>
</html>
