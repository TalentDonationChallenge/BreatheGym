
		window.fbAsyncInit = function(){
			FB.init({
				appId : '114295028916691',
				cookie : true,
				xfbml : true,
				version : 'v2.4'
			});
			
			FB.getLoginStatus(function(response) {
    			statusChangeCallback(response);
  			});
  			
		};

		function logout(){
			FB.logout(function(response){
  				statusChangeCallback(response);
  			});
		}

		function login(){
			FB.login(function(response){
  				if(response.status === 'connected'){
  					testAPI();
  				} else if (response.status === 'not_authorized'){
  					document.getElementById('status').innerHTML = 'Please log ' +
  					'into this app';
  				} else {
  					document.getElementById('status').innerHTML = 'Please log ' +
  					'into Facebook';
  				}
  			}, {scope:'public_profile, email'});
		}
		
		
		(function(d, s, id) {
  			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
	 		js = d.createElement(s); js.id = id;
	 		js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.4&appId=114295028916691";
	 		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		

		function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
		    // The response object is returned with a status field that lets the
		    // app know the current login status of the person.
		    // Full docs on the response object can be found in the documentation
		    // for FB.getLoginStatus().
		    if (response.status === 'connected') {
		      // Logged into your app and Facebook.
		      testAPI();
		    } else if (response.status === 'not_authorized') {
		      // The person is logged into Facebook, but not your app.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';
		    } else {
		      // The person is not logged into Facebook, so we're not sure if
		      // they are logged into this app or not.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
		  }

		//status checking function
		function checkLoginState() {
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		}

		// Function implemented after logging in
		function testAPI(){
			console.log('Welcome! Fetching your information....');
			document.getElementsByClassName('login').innerHTML = '로그아웃';
			FB.api('/me', function(response) {
				console.log('Successful login for : ' + response.name);
				document.getElementById('status').innerHTML =
				 'Thanks for loggin in, '+ response.name + '!';
			});
		}


