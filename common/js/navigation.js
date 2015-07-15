$(document).ready(function () {
	/* 로그인창 껐다 켰다 하기 */
	$(".login").click(function () {
		$("#loginModal").addClass("show");
	});
	$(".close").click(function () {
		$("#loginModal").removeClass("show");
	});

});