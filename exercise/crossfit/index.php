<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once(__DIR__.'/../../framework/framework.php');
	require_once(__DIR__.'/../memberRecordsFromServer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('크로스핏', 
	array('/exercise/css/font-awesome/css/font-awesome.css',
        '/exercise/css/style.css',
        '/exercise/css/style-responsive.css',
        '/exercise/css/table-responsive.css',
        '/exercise/css/to-do.css',
        '/exercise/css/zabuto_calendar.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<?php
			// 짐 전체의  랭킹을 가져옵니다.
			// $breathRanking = BreathRanking();
			// $courseAforBreathMember = $breathRanking[0];
			// $courseBforBreathMember = $breathRanking[1];
			// $courseCforBreathMember = $breathRanking[2];

			// //회원의 랭킹을 가져옵니다.
			// $gymMemverrecord = getUserExerciseRecord('8d8d8fq0fu');
			// $courseAforGymMember= $gymMemverrecord[0];
			// $courseBforGymMember = $gymMemverrecord[1];
			// $courseCforGymMember = $gymMemverrecord[2];


	?>

	<!--header start-->
	<?php memberHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("crossfit"); ?>
	<!--sidebar end-->
		 <section id = "main-content">
                <section class = 'wrapper'>
                    <div class = "record">
                        <div role="tabpanel">
                        
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#courseA" aria-controls="courseA" role="tab" data-toggle="tab"><?php printf($courseAforBreathMember[0]['name']) ?></a></li>
                                <li role="presentation" ><a href="#courseBforGymMember" aria-controls="courseBforGymMember" role="tab" data-toggle="tab"><?php printf($courseBforBreathMember[0]['name']) ?></a></li>
                                <li role="presentation" ><a href="#courseCforGymMember" aria-controls="courseCforGymMember" role="tab" data-toggle="tab"><?php printf($courseCforBreathMember[0]['name']) ?></a></li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">   
                            	 <div role="tabpanel" class="tab-pane active" id="courseA">
                                		<div class="memberrecordtable">
					                        <div class="content-panel">
					                            
					                            <table class="table">
					                                <thead>
					                                    <tr>
					                                        
					                                        <th>회원이름</th>
					                                        <th>기록</th>
					                                        
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                    <tr>
					                                        
					                                        <td><?php //printf($courseAforBreathMember[0]['member']) ?></td>
					                                        <td><?php //printf($courseAforBreathMember[0]['count']) ?>개</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td><?php //printf($courseAforBreathMember[1]['member']) ?></td>
					                                        <td><?php //printf($courseAforBreathMember[1]['count']) ?>개</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td><?php //printf($courseAforBreathMember[2]['member']) ?></td>
					                                        <td><?php //printf($courseAforBreathMember[2]['count']) ?>개</td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><!--/content-panel -->
					                    </div><!-- /col-md-12 -->

                                </div>
                                <div role="tabpanel" class="tab-pane" id="courseBforGymMember">
                                		<div class="memberrecordtable">
					                        <div class="content-panel">
					                            
					                            <table class="table">
					                                <thead>
					                                    <tr>
					                                        
					                                        <th>회원이름</th>
					                                        <th>기록</th>
					                                        
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                    <tr>
					                                        
					                                         <td><?php //printf($courseBforBreathMember[0]['member']) ?></td>
					                                         <td><?php //printf($courseBforBreathMember[0]['count']) ?>개</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                          <td><?php //printf($courseBforBreathMember[1]['member']) ?></td>
					                                          <td><?php //printf($courseBforBreathMember[1]['count']) ?>개</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                         <td><?php //printf($courseBforBreathMember[2]['member']) ?></td>
					                                         <td><?php //printf($courseBforBreathMember[2]['count']) ?>개</td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><!--/content-panel -->
					                    </div><!-- /col-md-12 -->

                                </div>
                                 <div role="tabpanel" class="tab-pane" id="courseCforGymMember">
                                		<div class="memberrecordtable">
					                        <div class="content-panel">
					                            
					                            <table class="table">
					                                <thead>
					                                    <tr>
					                                        
					                                        <th>회원이름</th>
					                                        <th>기록</th>
					                                        
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                    <tr>
					                                        
					                                         <td><?php //printf($courseCforBreathMember[0]['member']) ?></td>
					                                         <td><?php //printf($courseCforBreathMember[0]['count']) ?></td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td><?php //printf($courseCforBreathMember[1]['member']) ?></td>
					                                         <td><?php //printf($courseCforBreathMember[1]['count']) ?></td>
					                                        
					                                    </tr>
					                                    <tr>
					                                         <td><?php //printf($courseCforBreathMember[2]['member']) ?></td>
					                                         <td><?php //printf($courseCforBreathMember[2]['count']) ?></td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><!--/content-panel -->
					                    </div><!-- /col-md-12 -->

                                </div>

                                       
                 			</div>
                 
                    </div><!-- /col-md-12 -->
                 </div>
                  <div class="myrecordtable">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> 회원 개인 기록</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th>운동이름</th>
                                        <th>순위</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                         <td><?php //printf($courseAforGymMember['name'])?></td>
                                        <td><?php //echo($courseAforGymMember['ranking']."%") ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><?php //printf($courseBforGymMember['name'])?></td>
                                        <td><?php //echo($courseBforGymMember['ranking']."%")?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><?php //printf($courseCforGymMember['name'])?></td>
                                        <td><?php //echo($courseCforGymMember['ranking']."%")?></td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--/content-panel -->
                    </div><!-- /col-md-12 -->
                    
                </section>
                <section class = "wrapper">
                    <div class="row mt">
                        <div id="memberrecordtable">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> 운동기록차트</h4>
                                
                                <div class="panel-body">
                                    <div id="hero-graph" class="graph">
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </section>
            </section>
           
		</section>
	    <script src="/exercise/js/jquery.js"></script>
        <script src="/exercise/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="/exercise/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/exercise/js/jquery.scrollTo.min.js"></script>
        <script src="/exercise/js/jquery.nicescroll.js" type="text/javascript"></script>
        
        
        <!--common script for all pages-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="/exercise/js/common-scripts.js"></script>
        
        <!--script for this page-->
        <script src="/exercise/js/morris-conf.js"></script>
</body>
</html>