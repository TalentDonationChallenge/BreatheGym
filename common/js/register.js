function emailTest(string){
	var regexp = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	return regexp.test(string);
}

function passwordTest(string){
	var regexp = /^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,20})$/;
	return regexp.test(string);
}

$('document').ready(function(){

	$('#email').blur(function(){
		var email = $('#email').val();
		if(emailTest(email)){
			$('#emailGroup').addClass('has-success has-feedback');
		} else {
			$('#emailGroup').addClass('has-error has-feedback');
		}
	});

	$('#password').blur(function(){
		var password = $('#password').val();
		if(passwordTest(password)){
			$('#passwordGroup').addClass('has-success has-feedback');
		} else {
			$('#passwordGroup').addClass('has-error has-feedback');
		}
	});

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
});