<?php 
    require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴', 
    array('/exercise/css/font-awesome/css/font-awesome.css',
          '/exercise/css/style.css',
          '/exercise/css/style-responsive.css'
          ));?>
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
    <?php memberSidebar("boxing"); ?>
    <!--sidebar end-->
   <section id = "main-content">
                <section class = wrapper>
                    <div class = "row2">
                        
                            <div class = "boxprogress2">
                                <h4><i class = "fa fa-angle-right"></i>오늘의 복싱 진도</h4>
                                    
                                <div class = "totalboxingpregress">
                                     <div class ="eachboxingprogress">
                                        <div class = "progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 100%">
                                            <span class = "sort">100% complete</span>
                                        </div>
                                    </div>
                                    <div class ="eachboxingprogress">
                                        <div class = "progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 100%">
                                            <span class = "sort">100% complete</span>
                                        </div>
                                    </div>
                                     <div class ="eachboxingprogress">
                                        <div class = "progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 20%">
                                            <span class = "sort">20% complete</span>
                                        </div>
                                    </div>
                                     <div class ="eachboxingprogress">
                                        <div class = "progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 0%">
                                            <span class = "sort">0% complete</span>
                                        </div>
                                    </div>
                                     <div class ="eachboxingprogress">
                                        <div class = "progress-bar progress-bar-normal" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax = "100" style="width : 0%">
                                            <span class = "sort">0% complete</span>
                                        </div>
                                    </div>
                                </div>
                            
                                 <h2>잽운동</h2>

                                 <!-- 16:9 동영상 -->

                                <div class="boxingbox currentprogressimg embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CWBqwq8GgGU"></iframe>
                                </div>

                                 <!-- <div class = "boxingbox currentprogressimg">
                                    <img src = "/exercise/img/boxingimg.jpg" width="100%" height="100%">
                            
                                </div> -->

                                
                                
                                <div class="boxingbox currentprogressabout">
                                    <h2>연습방법</h2>
                                      <p class="lead">저도 잘 몰라요. 그냥 열심히 하시면 됩니다.</p>
                                      <p class="lead">근데 과연 잘 할 수 있을까요?</p>
                                       <p class="lead">후후</p>
                                     
                                </div>
                                </div>

                                </div>
                               
                                
                            </div>
                    </div>
                    <div class = "row3">
                        
                        <div class = "boxprogress3">
                            <h4><i class = "fa fa-angle-right"></i>이전 내 진도</h4>
                            <p>잽운동</p>
                            <div class = "boxing">
                                <img class = "boximg" src = "/exercise/img/boxingimg.jpg" width="100%" height="30%">
                                    </div>
                            
                           
                        </div>
                        <div class = "boxprogress4">
                            <h4><i class = "fa fa-angle-right"></i>다음 진도</h4>
                            <p>뎀프시롤</p>
                            <div class = "boxing">
                                <img class = "boximg" src = "/exercise/img/boxingimg.jpg" width="100%" height="30%">
                                    </div>
                            
                          
                        </div>
                    </div>
                     </div>
                    
                </section>
                
            </section>
      
        <script src="/exercise/js/bootstrap.min.js"></script>
       
        <script src="/exercise/js/jquery.nicescroll.js" type="text/javascript"></script>
       
        <!--사이드바가 화면 크기에 따라 자동으로 사라지게 해주는 js가 있는 곳 -->
        <!--이것과  style-responsive.css 필-->
        <!-- 간단한 듯 보이지만 무려 3개의 콤비네이션!....죄송....-->
        <script src="/exercise/js/jquery.js"></script>
        <script class="include" type="text/javascript" src="/exercise/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/exercise/js/common-scripts.js"></script>

       


        
</body>
</html>