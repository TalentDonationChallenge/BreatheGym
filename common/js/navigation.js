$(document).ready(function () {
    $(".login").click(function () {
		$("#loginModal").addClass("show");
	});
	$(".close").click(function () {
		$("#loginModal").removeClass("show");
	});
    $("#login").click(function () {
        if($('input[type="email"]').val()!==''
        &&$('input[type="password"]').val()!==''){
            $.ajax({
                url: '/member/signin/signin.php',
                method: 'post',
                data :{
                    email : $('input[type="email"]').val(),
                    password : $('input[type="password"]').val()
                }
            }).done(function (msg) {
                location.reload();
            });
        } else {

        }
    });
});
