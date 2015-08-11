//Initializing Javascript SDK
window.fbAsyncInit = function(){
	FB.init({
		appId : '114295028916691',
		xfbml : true,
		version : 'v2.4',
	});
};

//Load the SDK asynchronously
(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if(d.getElementById(id)) {return;}
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
}(document, 'script', 'facebook-jssdk'));

// Function implemented after logging in
function testAPI(){
	console.log('Welcome! Fetching your information....');
	FB.api('/me', function(response){
		console.log('Successful login for : ' + response.name);
		document.getElementById('status').innerHTML =
		 'Thanks for loggin in, '+response.name + '!';
	});
}

//Checking login status
/*
FB.getLoginStatus(function(response){
	if(response.status === 'connected'){
		console.log('logged in.');
	}
	else {
		FB.login();
	}
})*/