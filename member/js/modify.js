function passwordTest(string){
	var regexp = /^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,20})$/;
	return regexp.test(string);
}

$('document').ready(function(){
  //패스워드 검사

  $('#password').blur(function(){
    var password = $('#password').val();
    if(passwordTest(password)){
			$('#passwordGroup').removeClass('has-error has-feedback');
      $('#passwordGroup').addClass('has-success has-feedback');
			$('#passwordAlert').hide();
    } else {
			$('#passwordGroup').removeClass('has-success has-feedback');
      $('#passwordGroup').addClass('has-error has-feedback');
			$('#passwordAlert').show();
		}
  });
  //패스워드 확인 검사
  $('#passwordConfirm').blur(function(){
    var originPassword = $('#password').val();
    var confirmPassword = $('#passwordConfirm').val();
    if(originPassword == null || confirmPassword == null){
			$('#passwordConfirmGroup').removeClass('has-success has-feedback');
      $('#passwordConfirmGroup').addClass('has-error has-feedback');
			$('#passwordConfirmAlert').show();
    } else if (passwordTest(confirmPassword) && originPassword === confirmPassword){
			$('#passwordConfirmGroup').removeClass('has-error has-feedback');
      $('#passwordConfirmGroup').addClass('has-success has-feedback');
			$('#passwordConfirmAlert').hide();
    } else {
			$('#passwordConfirmGroup').removeClass('has-success has-feedback');
      $('#passwordConfirmGroup').addClass('has-error has-feedback');
			$('#passwordConfirmAlert').show();
    }
  });

  //닉네임 검사
  $('#nickname').blur(function(){
    var nickname = $('#nickname').val();
    if(!nickname){
			$('#nicknameGroup').removeClass('has-success has-feedback');
			$('#nicknameGroup').addClass('has-error has-feedback');
			$('#nicknameAlert').show();
    } else {
			$('#nicknameGroup').removeClass('has-error has-feedback');
      $('#nicknameGroup').addClass('has-success has-feedback');
			$('#nicknameAlert').hide();
    }
  });
	//전화번호 검사
	$('#phone').blur(function(){
    var nickname = $('#phone').val();
    if(!phone){
			$('#phoneGroup').removeClass('has-success has-feedback');
			$('#phoneGroup').addClass('has-error has-feedback');
			$('#phoneAlert').show();
    } else {
			$('#phoneGroup').removeClass('has-error has-feedback');
      $('#phoneGroup').addClass('has-success has-feedback');
			$('#phoneAlert').hide();
    }
  });

  $('#modify').click(function(){
			var phone = $('#phone').val();
			var password = $('#password').val();
			var nickname = $('#nickname').val();
			if(passwordTest(password) && nickname != null && phone != null){
				$.ajax({
						url: '../edit/modify.php',
						method: 'post',
						data : {
								password : $('#password').val(),
								nickname : $('#nickname').val(),
								phone : $('#phone').val()
						}
				}).done(function () {
						location.reload();
				});
			} else {
				alert('Check your form!');
			}


  });
});
