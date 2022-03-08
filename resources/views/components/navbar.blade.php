
 @php
        $theme = session()->get('theme');
        
 @endphp

<style>
        .header-bar{
          height:8vh;
          background: rgb(0,212,255);
          background: {{ $theme->name == 'dark' ? '#E000bb !important' : 
          'linear-gradient(198deg, rgba(0,212,255,1) 0%, rgba(53,143,209,1) 23%, rgba(65,139,210,1) 71%, rgba(0,212,255,1) 100%)'  }} ;
           
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
                      

        .navigation-bar{
          
          box-shadow: rgba(9, 30, 66, 0.15) 0px 1px 2px ;
          z-index:999;

          position: -webkit-sticky;
          position: sticky;
          top: 0;

          background: {{ $theme->name == 'dark' ? '#ECE9bb !important' : '#ECE9E6 !important'  }} ;  /* fallback for old browsers */
         /* background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6) !important; 
          background: linear-gradient(to right, #FFFFFF, #ECE9E6) !important;   */


        
        }
       

          .hover-navlink{
            color:#666;
            transition:0.3s;
          }
          .hover-navlink:hover{
            color:dodgerblue;
          }


        

        .menu-deroulant{
          display: none !important;
         background:white;
          opacity: 0;

        }
       

        .menu-trigger:hover .menu-deroulant{
           
          display: block !important;
          -webkit-animation: slideDown .5s;
         /* height: 10rem;*/
              opacity: 1;
        }


        .item-l1 {
          opacity:0;
          transition: 0.8s ;
          
        }

        .menu-trigger:hover .item-l1{
           -webkit-animation: slideDownitemL1 1s;
                      opacity: 1;

          }

        @keyframes slideDownitemL {
                    from {
                      
                      opacity: 0;
                    }
                    to {
                      
                      opacity: 1;
                    }
                }
        @keyframes slideDown {
                    from {
                    /*  height: 0rem;*/
                      opacity: 0;
                    }
                    to {
                    /*  height: 10rem;*/
                      opacity: 1;
                    }
                }


        .menu-deroulant-l2{
          display: none !important;
         background:white;
          width: 50rem;
          opacity: 0;

        }

        .menu-trigger-l2:hover .menu-deroulant-l2{
           
          display: block !important;
          width: 50rem;
          -webkit-animation: slideDownL2 0.51s;
             animation: slideDownL2 0.51s;
        
              opacity: 1;
        }

       
        @keyframes slideDownL2 {
            from {
           
              opacity: 0;
            }
            to {
            
              opacity: 1;
            }
        }

.search-zone{
  background:transparent !important;
}
.search-div{ 
   position:absolute;
    opacity: 0;
   display:none !important;
   
}
.search-input-div{ 
    position: absolute;
    
    width: 199px;
    display:inline-block !important;

}
.search-input-div .form-control-sm{ 
 border-radius:0px !important;

}
button.search{
  border-radius:0px !important;
  background:#999;
}

.search-zone:hover .search-div{ 
    display:inline-block !important;
    -webkit-animation: searchAnim 1s;
     animation: searchAnim 1s;
    opacity: 1;
   }
   
 @keyframes searchAnim {
                    from {
                      
                      opacity: 0;
                    }
                    to {
                      
                      opacity: 1;
                    }
                }


          .menu-cnx-trigger{
                
              background:transparent;
              }

        .menu-cnx-deroulant{
              display: block !important;
              background:white;
              opacity: 0;

           }

        .menu-cnx-trigger:hover .menu-cnx-deroulant{
             display: block !important;
            -webkit-animation: menuCnxDeroulantAnim 0.51s;
             animation: menuCnxDeroulantAnim 0.51s;
             opacity: 1;
        }

        @keyframes menuCnxDeroulantAnim {
                    from {
                      
                      opacity: 0;
                    }
                    to {
                      
                      opacity: 1;
                    }
                }

        .list-item{
          color:#555;
          padding:0rem 1rem;
          margin:4px 0px;
        }
        .list-item:hover{
          background-color:rgba(0,0,0,0.1);
         
        }

        .link-item{
          color:#555;
          text-decoration:none;
          font-size:0.9rem;
        }

      
</style>

<div class=' header-bar bg-info d-flex align-items-center justify-content-between '> 
    <div class='px-3 px-md-4 container-fluid d-flex align-items-center justify-content-between'>
        
       <a href='{{ route('seller-application', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}' class='text-decoration-none'>
        <span class='fs-6 fw-bold ms-md-3' style="color:white; text-shadow:1px 1px rgba(0,0,0,0.6)"> ⭐️ {{ __('SELL ON HITCOM')}} </span>
       </a>
     
        <div class='d-flex z-index-9'>  
        
        <ul class="navbar-nav mb-2 mb-lg-0 me-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white fs-6 font-weight-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
             @if (Session::get('currency') == 'dollar')

              &dollar;

              @else

               &euro;

              @endif

            </a>
           
            <ul class="dropdown-menu currency" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('change-currency', ['currency'=> 'euro', 'language' => Request()->language]) }}">&euro;</a></li>
              <li><a class="dropdown-item" href="{{ route('change-currency', ['currency'=> 'dollar', 'language' => Request()->language]) }}">&dollar;</a></li>
            </ul>

          </li>
       </ul> 
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

             @if (App::getLocale() == 'ar')

                🇦🇪

              @elseif (App::getLocale() == 'fr')
              
                🇨🇵

              @elseif (App::getLocale() == 'en')
              
                🇬🇧

              @endif

          </a>
          <ul class="dropdown-menu language" aria-labelledby="navbarDropdown">
            <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['fr', 'slug' => Request()->slug , Request()->getQueryString()  ]) }}">🇨🇵</a></li>
            <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['en', 'slug' => Request()->slug , Request()->getQueryString()  ]) }}">🇬🇧</a></li>
            <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['ar', 'slug' => Request()->slug , Request()->getQueryString()  ]) }}">🇦🇪</a></li>
          </ul>
        </li>
      </ul> 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
        

             @if ($theme->name == 'dark')

                  <a class="nav-link mx-2" href="{{ route('change-theme', ['theme'=> 'light', 'currency'=> 'euro', 'language' => Request()->language]) }}"
                   title='change to light theme' >☀️</a>

              @elseif ($theme->name == 'light')
              
                <a class="nav-link mx-2 " href="{{ route('change-theme', ['theme'=> 'dark', 'currency'=> 'euro', 'language' => Request()->language]) }}"
                 title='change to dark theme' >🌙</a>

              @endif

         
        </li>
      </ul> 
      </div>
    </div>
</div>

@php

 //$getQueryString=Request()->fullUrl();
 //$getQueryString = Request()->path();
 //$getQueryString = Request()->fullUrlWithQuery(['currency' => Request()->currency]);
 //$getQueryString = Request()->getQueryString();
 // dd($getQueryString); 

  $menu_categories = session()->get('menu');

@endphp

<style>
.navigation-bar{
          
          box-shadow: rgba(9, 30, 66, 0.15) 0px 1px 2px ;
          z-index:999;

          /* position: -webkit-sticky;
          position: sticky;
          top: 0px; */

          background: #ECE9E6;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        
        }

        .fixed{
          position:fixed;
          width:100%;
          left:0px;
          top:0px;
         /* background:crimson;*/
        }


  @media only screen and (max-width:700px){
              
              .cart-counter{
                margin-top:6px;
              left:10%!important;   
            
                }

              .fixed{
              position:fixed;
              width:100%;
              left:0px;
              top:0px;
              /* background:crimson;*/
            }
              
          }
</style>
<nav class=" navigation-bar navbar navbar-expand-lg navbar-light  " >

  <div class="container-fluid">

    @include('components.offcanvas-menu')

    <a class="text-decoration-none  navbar-brand"  href="{{ route('home', App::getLocale())}}"> 

      <img src='{{ app()->environment('production') ? asset('public/media/ui/logo/hitcom-logo.jpg') : asset('media/ui/logo/hitcom-logo.jpg')}}' 
          style='width:3rem;height:3rem; border-radius:50%; border:1px #fff solid;padding:1px' alt=''/>

      <span class='text-lead h4 text-uppercase products-title  d-inline-block '>  {{ __('hitcom') }}</span>
      
    </a>
    

    

    
    <div class="collapse navbar-collapse d-none d-md-block  " id="navbarSupportedContent">
     
      <ul class="navbar-nav mx-auto mb-2 mt-2 mb-lg-0 pb-3">
     
        <li class="menu-trigger nav-item dropdown position-relative">
          <a class="btn btn-outline-danger rounded-pill text-uppercase px-3 py-1 mt-1 dropdown-toggle animate__animated animate__slideInRight" > <i class="fa-solid fa-bars me-3"></i>{{ __('categories') }} </a>
          <div class='menu-deroulant bg-white rounded-sm shadow position-absolute top-20  d-flex justify-content-center' style='left:0.8rem;width:9.75rem'>
              <ul class='list-unstyled'>
                
            @foreach ($menu_categories as $category)
                <li class='menu-trigger-l2  mb-1 p-1 text-start ps-3 position-relative list-item ' style='border-bottom:1px solid #ddd' > 

                  <a href='{{ route('show-category' ,
                   ['slug'=> $category->category_slug ?? 'table' , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}' 
                  class='item-l1 text-decoration-none  hover-navlink link-item ' > 
                  
                    <i class="{{ $category->icon }} me-2"></i> 
                    
                    @if(App::getLocale() === 'fr')

                        {{ $category->fr_category_name }}

                        @elseif(App::getLocale() === 'en')
                          {{ $category->en_category_name }}
                        @else
                          {{ $category->ar_category_name }}
                        @endif 

                   <i class="fa-solid  {{App::getLocale() === 'ar' ? 'fa-chevron-left' : 'fa-chevron-right'}}" style='font-size:0.6rem'></i></a> 
                     <div class='menu-deroulant-l2 bg-light rounded-sm shadow 
                      position-absolute  px-3 d-flex justify-content-center' style='top:-1px;{{App::getLocale() === 'ar' ? 'right:9.70rem;' : 'left:9.70rem;'}}'>
                     
                          <div class=' row row-cols-3 my-3 '>
                                @foreach ($category->subcategories as $subcategory)
                                  <div class='col rounded-3'>
                                    <a href='{{ route('show-subcategory', ['slug'=> $subcategory->subcategory_slug, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' 
                                    class='link-dark text-decoration-none d-flex justify-content-start align-items-center mb-1  list-item'> 
                                    <i class="fas {{App::getLocale() === 'ar' ? 'fa-chevron-left' : 'fa-chevron-right'}}" style='font-size:0.5rem'></i> 
                                    <span class='ms-1' style='font-size:0.9rem'>
                                    
                                     @if(App::getLocale() === 'fr')
                                      {{ $subcategory->fr_subcategory_name }} 

                                        @elseif(App::getLocale() === 'en')
                                          {{ $subcategory->en_subcategory_name }} 
                                        @else
                                        {{ $subcategory->ar_subcategory_name }} 
                                        @endif 
                                    
                                    </span>
                                    </a>
                                  </div>  
                                @endforeach 
                          </div>
                          
                     </div>
                </li>
            @endforeach 
          </ul>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="btn btn-transparent  ms-3 hover-navlink  fw-bold 
           animate__animated animate__fadeIn animate__delay-1s animate__fast" href="{{ route('home', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}" 
           style='font-variant: small-caps;font-size:1.2rem'> {{ __('the shop') }} </a>
        </li>

        <li class="nav-item dropdown">
          <a class="btn btn-transparent   hover-navlink  fw-bold 
           animate__animated animate__fadeIn animate__delay-1s animate__fast" href="{{ route('about-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}" 
            style='font-variant: small-caps;font-size:1.2rem'> {{ __('about us') }} </a>
        </li>

        <li class="nav-item dropdown">
          <a class="btn btn-transparent  hover-navlink  fw-bold 
           animate__animated animate__fadeIn animate__delay-1s animate__fast" href="{{ route('contact-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}"
             style='font-variant: small-caps;font-size:1.2rem'> {{ __('contact us') }}  </a>  
       </li>
        <li class="nav-item dropdown">
          <a class="btn btn-transparent  hover-navlink  fw-bold 
           animate__animated animate__fadeIn animate__delay-1s animate__fast" href="{{ route('contact-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}"
             style='font-variant: small-caps;font-size:1.2rem'> {{ __('faq') }}  </a>  
       </li>
       
      </ul>

      
      <form class="" method='GET' action='{{route('search-query', [ 'language' => Request()->language])}}'>

        <div class='search-zone'>

            <div class='d-inline-block search-div'>
                <div class=' search-input-div ' style='top: 0px;{{App::getLocale() === 'ar' ? 'left: 0px; ' : 'right: 0px; '}} '>
                    <input name='item' class=" form-control form-control-sm"  placeholder="{{ __('Search') }}" >
                </div>
            </div>
           
            <button class="search-btn btn btn-sm btn-default" type="submit"> <i class="fa-solid fa-magnifying-glass text-secondary"></i></button>
        </div>
            
        
      </form>


      <div class=' my-2 my-md-0 '>

      @auth
                  @switch(Auth::user()->role)
                      @case('admin')
                           <a title='notifications link' href="{{route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"
                            class='text-decoration-none'> 
                            
                                  @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="position-relative d-inline-block top-20 badge rounded-pill bg-danger" 
                                          style='top:-20px;{{App::getLocale() === 'ar' ? 'right:15px ' : 'left:15px '}}'>
                                          {{Auth::user()->unreadNotifications->count()}}
                                    </span>
                                  @endif
                              
                              <i class="fa-solid fa-bell text-secondary  @guest ms-3 @endguest @auth   @if(Auth::user()->unreadNotifications->count() <= 0) ms-3 @endif @endauth"></i>
                          </a>
                          @break
                      @case('manager')
                            <a title='notifications link' href="{{route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"
                              class='text-decoration-none'> 
                              
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                      <span class="position-relative d-inline-block top-20 badge rounded-pill bg-danger" 
                                            style='top:-20px;{{App::getLocale() === 'ar' ? 'right:15px ' : 'left:15px '}}'>
                                            {{Auth::user()->unreadNotifications->count()}}
                                      </span>
                                    @endif
                                
                                <i class="fa-solid fa-bell text-secondary  @guest ms-3 @endguest @auth   @if(Auth::user()->unreadNotifications->count() <= 0) ms-3 @endif @endauth"></i>
                            </a>
                          @break
                      @case('seller')
                            <a title='notifications link' href="{{route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"
                              class='text-decoration-none'> 
                              
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                      <span class="position-relative d-inline-block top-20 badge rounded-pill bg-danger" 
                                            style='top:-20px;{{App::getLocale() === 'ar' ? 'right:15px ' : 'left:15px '}}'>
                                            {{Auth::user()->unreadNotifications->count()}}
                                      </span>
                                    @endif
                                
                                <i class="fa-solid fa-bell text-secondary  @guest ms-3 @endguest @auth   @if(Auth::user()->unreadNotifications->count() <= 0) ms-3 @endif @endauth"></i>
                            </a>
                          @break
                      @default
                            <a title='notifications link' href="{{route('client-notifications-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"
                              class='text-decoration-none'> 
                              
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                      <span class="position-relative d-inline-block top-20 badge rounded-pill bg-danger" 
                                            style='top:-20px;{{App::getLocale() === 'ar' ? 'right:15px ' : 'left:15px '}}'>
                                            {{Auth::user()->unreadNotifications->count()}}
                                      </span>
                                    @endif
                                
                                <i class="fa-solid fa-bell text-secondary  @guest ms-3 @endguest @auth   @if(Auth::user()->unreadNotifications->count() <= 0) ms-3 @endif @endauth"></i>
                            </a>
                  @endswitch
              
           @endauth
      </div>


      <div class='me-2 my-2 my-md-0 '>
            <a href='{{ route('show-wishlist', ['language' => App::getLocale()]) }}' class='text-secondary text-decoration-none' title='wish list'>
             @if(session()->get('wishlist_count') )
              <span class="position-relative d-inline-block badge rounded-pill bg-danger " 
                 style='top:-20px;{{App::getLocale() === 'ar' ? 'right:15px ' : 'left:15px '}}'>
                {{ session()->get('wishlist_count') ? session()->get('wishlist_count') : '' }}
               </span>
            
               <i class="fas fa-heart text-secondary"></i>
               @endif
          </a>
      </div>
      
        @php 

        if(session()->get('compta')){
           
            $compta=session()->get('compta');
            if($compta['total_qty']==0){
              $total_qty='';
            }else{
              $total_qty=$compta['total_qty'];
            }
          
            
          }else{
            $total_qty='';
          };

        @endphp
        
      <div class='mx-2 my-2 my-md-0  position-relative'>
          <a href='{{ route('show-cart', ['currency' => Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' class='text-secondary' title='cart list'>
              <span class="position-absolute   badge rounded-pill bg-danger" 
              style='top:-15px;font-size:.8rem; {{App::getLocale() === 'ar' ? 'right:13px ' : 'left:13px '}}'
              >{{ $total_qty }}</span><i class="fas fa-shopping-cart"></i>
          </a>
      </div>
      
    

      <div class=' my-2 my-md-0 '>
         
        <ul class="list-unstyled mb-2 mb-lg-0">
       
          <li class="nav-item dropdown menu-cnx-trigger  text-center position-relative">
         
            <a class="nav-link dropdown-toggle" href="#" style='{{Auth::check() ? "margin-top: -9px;" : ""}}' >
                @guest <i class="fas fa-user-circle text-secondary " style='font-size:1.2rem'></i> @endguest

                @auth  
                <img src={{app()->environment('production') ? asset('public/'.Auth::user()->user_image) : asset(Auth::user()->user_image) }} title="{{Auth::user()->first_name}} " 
                height=35 width=35 class='rounded-circle mt-n2 d-inline-block' alt='user'>
                @endauth
            </a>
         
              <ul class='menu-cnx-deroulant list-unstyled rounded-sm shadow-sm py-1 position-absolute d-flex justify-content-start'
               style='top:2.6rem; {{App::getLocale() === 'ar' ? 'left:14px; ' : 'right:14px;'}} '>
                @guest
                <li class="list-item" ><a class="link-item text-nowrap" href="{{ route('login', App::getLocale())}}"> {{ __('Sign in') }}</a></li>
                <li class="list-item" ><a class="link-item text-nowrap" href="{{ route('register-form', App::getLocale())}}"> {{ __('Sign up') }}</a></li>
                @endguest

                @auth

                  @switch(Auth::user()->role)
                      @case('admin')
                          <li class="list-item  text-start ps-3 " ><a  class="link-item text-nowrap" 
                          href="{{ route('admin-users-list', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"> {{ __('profile admin') }}</a></li>
                          @break
                      @case('manager')
                          <li class="list-item  text-start ps-3 " ><a  class="link-item text-nowrap" 
                          href="{{ route('manager-profile', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"> {{ __('profile manager') }}</a></li>
                          @break
                      @case('seller')
                          <li class="list-item  text-start ps-3 " ><a  class="link-item text-nowrap" 
                          href="{{ route('seller-profile', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"> {{ __('profile seller') }}</a></li>
                          @break
                      @default
                          <li class="list-item  text-start ps-3 " ><a  class="link-item text-nowrap" 
                          href="{{ route('client-profile', [ 'language' => Request()->language, 'id' => Auth::id() ])}}"> {{ __('profile client') }}</a></li>
                  @endswitch
                         <li class="list-item  text-start ps-3" ><a  class="link-item text-nowrap"  href="{{ route('auth-logout', App::getLocale())}}"> {{ __('Sign out') }}</a></li>
              
                @endauth
              </ul>

          </li>
      </ul> 
      </div>
    </div>

  </div>
</nav>

 @push('script')
<script>

  let navigationBar = document.querySelector(".navigation-bar");
   

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function(e) {
          // print "false" if direction is down and "true" if up
           

            console.log(this.oldScroll > this.scrollY);
            
            if(this.oldScroll > this.scrollY){
              console.log('up scroll');
              navigationBar.classList.remove('fixed')
            }else{
              navigationBar.classList.add('fixed')
            }

             this.oldScroll = this.scrollY;
          navScroll()
    };

    function navScroll() {
 
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
       // navigationBar.classList.add('fixed')
        
    } else {
       // navigationBar.classList.remove('fixed')
        
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

</script>
@endpush