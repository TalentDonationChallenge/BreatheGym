<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
		array('/common/font-awesome/css/font-awesome.css','/common/fileupload/css/jquery.fileupload.css',
			'/common/css/table-responsive.css','/community/css/community.css'));?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php
		login();
		navigation();
	?>
	<section id="main-content">
		<section class="wrapper">
			<div class="container">
				<h3><i class="fa fa-angle-right"></i> 복싱자료실</h3>
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="title" class="col-sm-1 control-label">제목</label>
						<div class="col-sm-6">
							<input id="title" type="text" name="title" class="form-control" placeholder="제목을 입력하세요.">
						</div>
					</div>
				</div>
				<textarea name="content" class="write form-control" placeholder="내용을 입력하세요."></textarea>
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="youtube" class="col-sm-1 control-label">유튜브</label>
						<div class="col-sm-11">
							<input id="youtube" type="text" name="youtube" class="form-control" placeholder="http://">
						</div>
					</div>
				</div>
				<form id="fileupload" method="POST" enctype="multipart/form-data">
					<!-- Redirect browsers with JavaScript disabled to the origin page -->
					<noscript><input type="hidden" name="redirect" value="/community/freeboard/write.php"></noscript>
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					<label>이미지 첨부</label>
					<div class="row fileupload-buttonbar">
						<div class="col-lg-7">
							<!-- The fileinput-button span is used to style the file input field as button -->
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Add files...</span>
								<input type="file" name="files[]" multiple accept="image/*">
							</span>
							<span class="btn btn-primary start">
								<i class="fa fa-upload"></i>
								<span>Start</span>
							</span>
							<!-- The global file processing state -->
							<span class="fileupload-process"></span>
						</div>
						<!-- The global progress state -->
						<div class="col-lg-5 fileupload-progress fade">
							<!-- The global progress bar -->
							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar progress-bar-success" style="width:0%;"></div>
							</div>
							<!-- The extended global progress state -->
							<div class="progress-extended">&nbsp;</div>
						</div>
					</div>
					<!-- The table listing the files available for upload/download -->
					<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
				<!-- </form> -->
			</form>
			<nav>
				<button class="btn mt mr btn-primary submit">확인</button>
				<a href="index.php">
					<button class="btn btn-default mt">취소</button>
				</a>
			</nav>
			</div>
		</section>
	</section>

	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
	<!-- <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script> -->
	<script src="/common/fileupload/js/vendor/jquery.ui.widget.js"></script>
	<script src="/common/fileupload/js/jquery.iframe-transport.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-process.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-image.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-validate.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-ui.js"></script>
	<script src="../js/board.js"></script>
	<script src="/common/js/upload.js"></script>
</body>
</html>
