$(document).ready(function () {
    $(".item").click(function () {
		$("#zoom").addClass("show");
	});
	$(".close").click(function () {
		$("#zoom").removeClass("show");
	});
});
