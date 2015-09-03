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
	<?php adminSidebar("member"); ?>
	<!--sidebar end-->
	<section id="main-content" branch='<?=$branch?>'>
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 회원 프로필</h3>
			<div class="col-lg-12 mt">
                <div class="content-panel mb">
                    <img class="profile-pic" src="." alt=""/>
					<div class="profile-info">
						<table class="table">
							<tbody>
								<tr>
									<td>이름</td>
									<td>나익채</td>
									<td class="hidden-xs">생년월일</td>
									<td class="hidden-xs">1991.12.07</td>
								</tr>
                                <tr class="visible-xs">
                                    <td>생년월일</td>
									<td>1991.12.07</td>
                                </tr>
								<tr>
									<td>성별</td>
									<td>남자</td>
									<td class="hidden-xs">신장</td>
									<td class="hidden-xs">175cm</td>
								</tr>
                                <tr class="visible-xs">
                                    <td>신장</td>
									<td>175cm</td>
                                </tr>
								<tr>
									<td>등록일</td>
									<td>7월 21일</td>
									<td class="hidden-xs">전화번호</td>
									<td class="hidden-xs">010-5388-7127</td>
								</tr>
                                <tr class="visible-xs">
                                    <td>전화번호</td>
									<td>010-5388-7127</td>
                                </tr>
                                <tr>
                                    <td>만료일</td>
                                    <td>8월 20일</td>
                                    <td class="hidden-xs">체중</td>
                                    <td class="hidden-xs"></td>
                                </tr>
                                <tr class="visible-xs">
                                    <td>체중</td>
                                    <td></td>
                                </tr>
							</tbody>
						</table>
					</div>
                </div>
                <button class="btn btn-primary" name="button">바코드 재발급</button>
			</div>
		</section>
	</section>
	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
</body>
</html>
