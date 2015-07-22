<?php 
	require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴', 
	array('/common/font-awesome/css/font-awesome.css',
		'/common/css/style.css',
		'/common/css/style-responsive.css',
		'../css/record.css'));?>
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
	<?php adminSidebar("record"); ?>
	<!--sidebar end-->
	<!-- Main content start -->
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> 기록관리 </h3>
			<!-- page start-->
			<div class="panel panel-default">
				<section class="panel-body table-panel">
					<div class="table-responsive">
						<table class="table table-striped">
							
							<thead>
								<tr>
									<td>이름</td>
									<td>회원코드</td>
									<td>출석시간</td>
									<td>운동종류</td>
									<td>기록입력</td>
								</tr>
							</thead>
							<tbody>
								<!-- contents heare -->
								<!-- 오늘 출석 명단 보여주기 -->
								<?php
									$members = AdminRecordManage::getTodayMembers();
									$exercises = AdminRecordManage::getTodayExercises();
									if(count($members)==0){//출석자 없을시
										echo "<tr><td colspan=\"5\">오늘 출석자 없습니다</td></tr>";
									} else {
										foreach($members as $index){//출석한 사람 수만큼
											foreach($exercises as $exIndex){?><!--한 운동종류만큼-->
												<tr class="recordRow">
												<?php
												foreach($index as $key=>$value){?><!--이름과 코드, 출석 시간 출력-->
													<td><?=$value?></td>
												<?php
												}?>
													<td><?=$exIndex['name']?></td>
												<?php
													if($exIndex['type']==0){?><!--횟수 재는 운동일 떄-->
														<td><input type="text" name="countRecord" size="5" value=""/>개</td>
													<?php
													} else if ($exIndex['type']==1){?><!-- 시간 재는 운동일 때-->
														<td>
															<input type="text" name="timeRecordMinute" size="3" value=""/>분
															<input type="text" name="timeRecordSecond" size="3" value=""/>초
														</td>
													<?php
													}
												?>
												</tr>
											
											<?php
											$vm = "wow";
											}
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</section>
				<section class="panel-footer">
					<div class="align-right">
						<input type="button" id="input" value="저장" name="input"/>
					</div>
				</section>
				
			</div><!-- page end-->
		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="../js/jquery-ui.custom.min.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/common-scripts.js"></script>
	<script src="../js/record-scripts.js"></script>
</body>
</html>