<?php 
    require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php head('마이 페이지', 
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
    <?php memberSidebar("mypage"); ?>
    <!--sidebar end-->
    <section id= "main-content">
                <section class = "wrapper">
                    <div class = "col7 mt">
                        달력이들어갈곳입니다.
                        
                    </div>
                    <div class = "col7 mt">
                        업적
                        
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