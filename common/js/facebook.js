		window.fbAsyncInit = function(){
			FB.init({
				appId : '114295028916691',
				cookie : true,
				channelURL : 'localhost/index.php',
				xfbml : true,
				version : 'v2.4'
			});
			
			FB.getLoginStatus(function(response) {
    			statusChangeCallback(response);
  			});
		};


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
		      	logoutAPI();
		    } else {
		       // The person is not logged into Facebook, so we're not sure if
		       // they are logged into this app or not.
			   logoutAPI();
		    }
		  }


		function login(){
			console.log("login function");
			FB.login(function(response){
					location.reload();
					statusChangeCallback(response);
			}, {scope:'public_profile, email'})
		}

		function logout(){
			console.log("logout function");
			FB.logout(function(response){
  				statusChangeCallback(response);
  			});
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
				document.getElementById('login').innerHTML = '로그아웃';
				$("#login").off();
				$("#login").click(function(){
					logout();
				});
				FB.api('/me', function(response) {
					console.log('Successful login for : ' + response.name +
					'Thanks for loggin in, '+ response.name + '!');
					
				});
			}

		function logoutAPI(){
			
			console.log('Logged out!');
			document.getElementById('login').innerHTML = '로그인';
			document.getElementById('status').innerHTML = 'Please log into this app';
			$('#login').off();
			$('#facebookLogin').off();
			$('#facebookLogin').click(function(){
  				login();
  			});
			$('#login').click(function(){
				$('#loginModal').addClass("show");
			});
		}