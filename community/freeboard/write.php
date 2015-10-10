<?php
require_once(__DIR__.'/../../framework/framework.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php head('브리드 복싱 &amp; 크로스핏 - 관리자메뉴',
		array('/common/font-awesome/css/font-awesome.css','/common/fileupload/css/jquery.fileupload.css',
			'/common/css/table-responsive.css', '/community/css/community.css'));?>
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
			<h3><i class="fa fa-angle-right"></i> 자유게시판</h3>
			<!-- <div class="col-lg-12 mt"> -->
			<!-- <form action="add.php" method="post"> -->
				<div class="form-horizontal">
					<div class="form-group mt">
						<label for="title" class="col-sm-1 control-label">제목</label>
						<div class="col-sm-6">
							<input type="text" name="title" class="form-control" placeholder="제목을 입력하세요.">
						</div>
					</div>
					<!-- <div class="form-group">
						<label for="attach" class="col-sm-1 control-label">이미지첨부</label>
						<div class="col-sm-11">
							<input id="attach" type="file" name="image[]" accept="image/*" multiple="true">
						</div>
					</div> -->
				</div>
				<textarea name="content" class="write form-control" placeholder="내용을 입력하세요."></textarea>
				<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
					<!-- Redirect browsers with JavaScript disabled to the origin page -->
					<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					<label>이미지 첨부</label>
					<div class="row fileupload-buttonbar">
						<div class="col-lg-7">
							<!-- The fileinput-button span is used to style the file input field as button -->
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Add files...</span>
								<input type="file" name="files[]" multiple>
							</span>
							<button type="submit" class="btn btn-primary start">
								<i class="fa fa-upload"></i>
								<span>Start upload</span>
							</button>
							<button type="reset" class="btn btn-warning cancel">
								<i class="fa fa-ban"></i>
								<span>Cancel upload</span>
							</button>
							<button type="button" class="btn btn-danger delete">
								<i class="fa fa-trash"></i>
								<span>Delete</span>
							</button>
							<input type="checkbox" class="toggle">
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
				<nav>
					<button class="btn mt mr btn-primary submit">확인</button>
					<a href="index.php">
						<button class="btn btn-default mt">취소</button>
					</a>
				</nav>
			</form>
			</div>
		</section>
	</section>
	<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	    <tr class="template-upload fade">
	        <td>
	            <span class="preview"></span>
	        </td>
	        <td>
	            <p class="name">{%=file.name%}</p>
	            <strong class="error text-danger"></strong>
	        </td>
	        <td>
	            <p class="size">Processing...</p>
	            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
	        </td>
	        <td>
	            {% if (!i && !o.options.autoUpload) { %}
	                <button class="btn btn-primary start" disabled>
	                    <i class="fa fa-upload"></i>
	                    <span>Start</span>
	                </button>
	            {% } %}
	            {% if (!i) { %}
	                <button class="btn btn-warning cancel">
	                    <i class="fa fa-ban"></i>
	                    <span>Cancel</span>
	                </button>
	            {% } %}
	        </td>
	    </tr>
	{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	    <tr class="template-download fade">
	        <td>
	            <span class="preview">
	                {% if (file.thumbnailUrl) { %}
	                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
	                {% } %}
	            </span>
	        </td>
	        <td>
	            <p class="name">
	                {% if (file.url) { %}
	                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
	                {% } else { %}
	                    <span>{%=file.name%}</span>
	                {% } %}
	            </p>
	            {% if (file.error) { %}
	                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
	            {% } %}
	        </td>
	        <td>
	            <span class="size">{%=o.formatFileSize(file.size)%}</span>
	        </td>
	        <td>
	            {% if (file.deleteUrl) { %}
	                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	                    <i class="fa fa-trash"></i>
	                    <span>Delete</span>
	                </button>
	                <input type="checkbox" name="delete" value="1" class="toggle">
	            {% } else { %}
	                <button class="btn btn-warning cancel">
	                    <i class="fa fa-ban"></i>
	                    <span>Cancel</span>
	                </button>
	            {% } %}
	        </td>
	    </tr>
	{% } %}
	</script>

	<script src="/common/js/jquery-1.11.1.min.js"></script>
	<script src="/common/js/bootstrap.min.js"></script>
	<script src="/common/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="/common/js/common-scripts.js"></script>
	<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
	<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
	<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="/common/fileupload/js/vendor/jquery.ui.widget.js"></script>
	<script src="/common/fileupload/js/jquery.iframe-transport.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-process.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-image.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-audio.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-video.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-validate.js"></script>
	<script src="/common/fileupload/js/jquery.fileupload-ui.js"></script>
	<script src="../js/freeboard.js"></script>
	<script src="../js/upload.js"></script>
</body>
</html>
