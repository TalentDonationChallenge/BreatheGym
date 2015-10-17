function passwordTest(string){
	var regexp = /^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,20})$/;
	return regexp.test(string);
}

$('document').ready(function(){
  //패스워드 검사
  $('#password').blur(function(){
    var password = $('#password').val();
    if(passwordTest(password)){
      $('#passwordGroup').addClass('has-success has-feedback');
    } else {
      $('#passwordGroup').addClass('has-error has-feedback');
  });
  //패스워드 확인 검사
  $('#passwordConfirm').blur(function(){
    var originPassword = $('#password').val();
    var confirmPassword = $('#passwordConfirm').val();
    if(originPassword == null || confirmPassword == null){
      $('#passwordConfirmGroup').addClass('has-error has-feedback');
    } else if (passwordTest(confirmPassword) && originPassword === confirmPassword){
      $('#passwordConfirmGroup').addClass('has-success has-feedback');
    } else {
      $('#passwordConfirmGroup').addClass('has-error has-feedback');
    }
  });

  //닉네임 검사
  $('#nickname').blur(function(){
    var nickname = $('#nickname').val();
    if(nickname == null){
      $('#nicknameGroup').addClass('hass-error has-feedback');
    } else {
      $('#nicknameGroup').addClass('has-success has-feedback');
    }
  });

  
  $('#modify').click(function(){
    var values = $(':input');
    var allow = false;

    if(){

    } else {

    }
    if(){
      alert('없슴당');
    }
  });
});
