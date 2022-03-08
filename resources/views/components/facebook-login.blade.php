
<script>


 window.fbAsyncInit = function() {
    FB.init({
      appId      : '356362106269921',
      cookie     : true,                    
      xfbml      : true,                     
      version    : 'v13.0'           
    });


  function statusChangeCallback(response){  
    
    if (response.status === 'connected') {  

       console.log(response);
       let status = response.status;
       let fbUserId = response.authResponse.userID;
        
        FB.api('/me', function(response) {  
                
                let info={
                    name: response.name,
                    status,
                    fbUserId,
                }

                console.log(info);
                
            });
  
    }
 }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
      
    });
  }


 

    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 

 function logout() {               
   FB.logout(function(response) {
      console.log(response);
    })
  }
function login() {

  FB.login(function(response) {
      if (response.authResponse) {

         console.log(response);
       let status = response.status;
       let fbToken= response.authResponse.accessToken;
       let fbUserId = response.authResponse.userID;

      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', {fields: 'name, email'},function(response) {
        console.log('Good to see you, ' + response.name + '.'+ 'email '+ response.email );
       
        let info={
                    name: response.name,
                    email: response.email,
                    status,
                    fbUserId,
                    fbToken,

                    
                }
              // fetch to controller FbController [login the user, store token in fbsession, put a middleware to check fbsession token]
                console.log(info);

                checkLoginState()


      });
      } else {
      console.log('User cancelled login or did not fully authorize.');
      }
  }, {
      scope: 'email', 
      return_scopes: true
  });

}

</script>


{{-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button> --}}
<a href='#' class='btn btn-primary btn-sm'  onclick="event.preventDefault();login();"><i class="fa-brands fa-facebook-square text-white me-2"></i>{{ __('Facebook login') }}</a>
{{-- <a href='#'  class='btn btn-danger btn-sm'  onclick="logout();">logout</a> --}}

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

