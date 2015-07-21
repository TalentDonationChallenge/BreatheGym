<?php 
    require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php head('마이 페이지', 
    array('/common/font-awesome/css/font-awesome.css',
        '/common/css/style.css',
        '/exercise/css/style.css',
        '/common/css/style-responsive.css',
        '../css/fullcalendar.min.css',
        '../css/exercise.css'));?>
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
    <?php memberSidebar("mypage"); ?>
    <!--sidebar end-->
    <section id= "main-content">
                <section class = "wrapper">
                    <div class = "col7 mt">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="calendar" class="has-toolbar"></div>
                            </div>
                        </section>
                    </div>
                    <div class = "col9 mt">
                        <h3>업적</h3>
                        <p>당신의 업적은 무엇일까</p>
                        <p>당신의 업적은 무엇일까</p>
                        <p>당신의 업적은 무엇일까</p>
                        <p>당신의 업적은 무엇일까</p>
                    </div>
                </section>
            </section>
           

        </section>
    <script src="/common/js/jquery-1.11.1.min.js"></script>
    <script src="/common/js/bootstrap.min.js"></script>
    <script src="/exercise/js/common-scripts.js"></script>
    <script src="../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../js/jquery-ui.custom.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/fullcalendar.js"></script> 
    <script src="../js/calendar-conf-events.js"></script>  


      
</body>
</html>