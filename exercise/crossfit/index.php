<?php 
	require_once(__DIR__.'/../../framework/framework.php');
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

	<!--header start-->
	<?php memberHeader(); ?>
	<!--header end-->
	<!--sidebar start-->
	<?php memberSidebar("crossfit"); ?>
	<!--sidebar end-->
		 <section id = "main-content">
                <section class = wrapper>
                    <div class = "record">
                        <div role="tabpanel">
                        
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#courseA" aria-controls="courseA" role="tab" data-toggle="tab">A코스</a></li>
                                <li role="presentation" ><a href="#courseB" aria-controls="courseB" role="tab" data-toggle="tab">B코스</a></li>
                                <li role="presentation" ><a href="#courseC" aria-controls="courseC" role="tab" data-toggle="tab">C코스</a></li>
                                
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
					                                        
					                                        <td>고구마</td>
					                                        <td>1'25</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고구미</td>
					                                        <td>1'30</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고소미</td>
					                                        <td>1'45</td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><! --/content-panel -->
					                    </div><!-- /col-md-12 -->

                                </div>
                                <div role="tabpanel" class="tab-pane" id="courseB">
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
					                                        
					                                        <td>고구미</td>
					                                        <td>1'25</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고소미</td>
					                                        <td>1'30</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고구마</td>
					                                        <td>1'45</td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><! --/content-panel -->
					                    </div><!-- /col-md-12 -->

                                </div>
                                 <div role="tabpanel" class="tab-pane" id="courseC">
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
					                                        
					                                        <td>고소미</td>
					                                        <td>1'25</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고구마</td>
					                                        <td>1'30</td>
					                                        
					                                    </tr>
					                                    <tr>
					                                        <td>고구미</td>
					                                        <td>1'45</td>
					                                       
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </div><! --/content-panel -->
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
                                        
                                        <td>A코스</td>
                                        <td>25%</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>B코스</td>
                                        <td>10%</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>C코스</td>
                                        <td>15%</td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
                    
                </section>
                <section class = "wrapper">
                    <div class="row mt">
                        <div class="col6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> A 운동</h4>
                                <p>뭐야이거 왜 되는거지</p>
                                <div class="panel-body">
                                    <div id="hero-graph" class="graph">
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> B 운동</h4>
                                <p>뭐야이거 왜 안돼</p>
                                <div class="panel-body">
                                    <div id="hero-bar" class="graph"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> C 운동</h4>
                                <p>뭐야이건 또 왜 안돼</p>
                                <div class="panel-body">
                                    <div id="hero-graph" class="graph"></div>
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