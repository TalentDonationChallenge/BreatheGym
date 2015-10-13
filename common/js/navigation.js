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
                if(msg.login == 'success'){
                    location.replace('index.php');
                } else if(msg.login == 'fail') {
                    $('#status').html('아이디와 비밀번호를 확인하세요');
                } else {
                    // 서버문제...
                    $('#status').html('로그인에 실패하였습니다. 다시 시도해주세요');
                }
            });
        } else {
            $('#status').html('아이디와 비밀번호를 입력하세요');
        }
    });
});
