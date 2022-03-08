
<style>
        .entete{
          height:8vh;
          background: rgb(0,212,255);
background: linear-gradient(198deg, rgba(0,212,255,1) 0%, rgba(53,143,209,1) 23%, rgba(65,139,210,1) 71%, rgba(0,212,255,1) 100%);
        }

        .cart-counter{
          top:-5px ; 
          left:100%!important; 
          font-size:0.7rem;
         
        }
        
        .currency{
          inset: -10px auto auto -1px!important;
        z-index: 9999!important;
        min-width: 3rem;
        }

        .language{
            inset: -10px auto auto -1px!important;
            z-index: 9999!important;
            min-width: 3rem;
        }
                      
        

         @media only screen and (max-width:700px){
              
              .cart-counter{
                margin-top:6px;
              left:10%!important;   
            
                }
              
          }

</style>



<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand text-uppercase" href="#">
    <i class="fas fa-dolly"></i>
    hitcom backoffice
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
      <div class='d-flex flex-grow-1' style=''> </div>

      <div class=' mt-2 '>

                <a href="{{route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}" class='text-secondary text-decoration-none' title='notifications'>
                   @auth 
                  
                    <span class="position-relative d-inline-block top-20 badge rounded-pill bg-danger" 
                    style='top:-20px;left:15px'>
                     
                    {{Auth::user()->unreadNotifications->count();}}
                    
                    </span>
                    @endauth
                    <i class="fa-solid fa-bell  ms-1"></i>
                </a>

      </div>

      <div class='mx-2 my-2 my-md-0 '>
         
       <ul class="navbar-nav mb-2 mb-lg-0">
       
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" title='connexion' id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               @auth  
               
               
               <img src="{{app()->environment('production') ? asset('public/'.Auth::user()->user_image) : asset(Auth::user()->user_image ) }}" 
              height=35 width=35 class='rounded-circle mt-n2 d-inline-block' alt='user'>
               @endauth
            </a>
              <ul class="dropdown-menu dropdown-menu-end  bg-info " aria-labelledby="navbarDropdown">
                @auth
                <li class="list-group-item bg-info py-1" aria-current="true">
                  <a class="text-decoration-none fs-6 text-light  fw-bolder" href="{{ route('home', App::getLocale())}}"> 
                  <i class="fa-solid fa-chalkboard-user"></i> {{ __('back to shop') }}
                  </a>
                </li>

                <li class="list-group-item bg-info py-1" aria-current="true">
                  <a class="text-decoration-none fs-6 text-light  fw-bolder" href="{{ route('auth-logout', App::getLocale())}}"> 
                  <i class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('Sign out') }}</a>
                </li>
              
             @endauth
                
              </ul>
          </li>
      </ul> 
      </div>
    </div>
  </div>
</nav>