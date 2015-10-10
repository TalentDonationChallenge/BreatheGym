<?php
    require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php head('브리드 복싱 &amp; 크로스핏 - 회원운동기록관리',
    array('/common/font-awesome/css/font-awesome.css',
        '/common/css/style.css','/common/css/style-responsive.css',
        '/common/css/fullcalendar.css','/exercise/css/mypage.css'));?>
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
            <div class = "col-md-4 mt">
                <section class="panel">
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                </section>
            </div>
            <div class = "col-md-12">
                <div class="row">
                    <h3>업적</h3>
                    <div class="darkblue-panel archivement mb">
                        <div class="icon">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                        <h5 class="pull-left">출석대장</h5>
                    </div>
                    <div class="grey-panel archivement mb">
                        <div class="icon">
                            <i class="fa fa-level-up"></i>
                        </div>
                        <h5 class="pull-left">성적급상승</h5>
                    </div>
                    <div class="blue-panel archivement mb">
                        <div class="icon">
                            <i class="fa fa-facebook-f"></i>
                        </div>
                        <h5 class="pull-left">페이스북연동</h5>
                    </div>
                    <div class="green-panel archivement mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">글작성</h5>
                    </div>
                    <div class="black-panel archivement mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">오늘은1등</h5>
                    </div>
                    <div class="orange-panel archivement mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">수다쟁이</h5>
                    </div>
                    <div class="pink-panel archivement mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">SNS는인생낭비</h5>
                    </div>
                    <div class="grass-panel archivement not-achive mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">전체1등</h5>
                    </div>
                    <div class="purple-panel archivement not-achive mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">이번달1등</h5>
                    </div>
                    <div class="yellow-panel archivement not-achive mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">잽잽원투</h5>
                    </div>
                    <div class="yellowgreen-panel archivement not-achive mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">로잉마스터</h5>
                    </div>
                    <div class="red-panel archivement not-achive mb">
                        <div class="icon">
                            <i class="fa"></i>
                        </div>
                        <h5 class="pull-left">지구력왕</h5>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script src="/common/js/jquery-1.11.1.min.js"></script>
    <script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/common/js/bootstrap.min.js"></script>
    <script src="/common/js/common-scripts.js"></script>
    <script src='/common/js/moment.min.js'></script>
	<script src='/common/js/fullcalendar.min.js'></script>
	<script src='/common/js/ko.js'></script>
    <script src='/exercise/js/mypage.js'></script>
</body>
</html>
