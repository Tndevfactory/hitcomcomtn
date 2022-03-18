
 @php
 $theme = session()->get('theme');
 
@endphp
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
@php

//$getQueryString=Request()->fullUrl();
//$getQueryString = Request()->path();
//$getQueryString = Request()->fullUrlWithQuery(['currency' => Request()->currency]);
//$getQueryString = Request()->getQueryString();
// dd($getQueryString); 

$menu_categories = session()->get('menu');

@endphp



<!DOCTYPE html>
       
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ config('app.url') }}">
        <meta name="app-env" content="{{ config('app.env') }}">

        @yield('meta')
        <title>Hitcom | @yield('title')</title>

      <link rel="icon"  type="image/x-icon" 
      href="{{ app()->environment('production') ? asset('public/favicon.ico') : asset('favicon.ico')  }}"/>
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       
       
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <link  rel="stylesheet"  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        {{-- <link  rel="stylesheet"  href="{{ app()->environment('production') ? 'public/'.asset('css/app.css') : asset('css/app.css') }}"/> --}}
            

         @if (App::getLocale() == 'ar')

             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

        @endif

<style>

  /*general */

    * {
        padding:0;
        margin:0;
        box-sizing:border-box;
        
    }
    body{
        
        /* font-family: 'Montserrat', sans-serif; */
        /* font-family: 'IBM Plex Sans Arabic', sans-serif; */
        /* font-family: 'Open Sans', sans-serif; */
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;

        color:rgb(49, 48, 48);
        line-height:26px;
        overflow-x: hidden;
        
        background-color:  {{ $theme->name == 'dark' ? 'rgb(225, 233, 236)!important' :  'rgb(241, 246, 255)'  }} ;
       
    }

    .categories-title{
      background-color: #2a2a2a;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: rgba(61, 61, 61, 0.1) 0px 3px 3px;
        font-weight: 500;
        letter-spacing:0.61px;
        font-size:1.4rem;
        

    }
    .products-title{
      background-color: #201f1f;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: rgba(61, 61, 61, 0.1) 0px 3px 3px;
        font-weight: 500;
        letter-spacing:0.61px;
        font-size:1.4rem;
    }

     @media only screen and (max-width:700px){
              
              .products-title, .categories-title{
                font-weight: 600;
                font-size:1rem;  
            
                }

                 body{
       
                font-size: 15px;
                }

              
          }
</style>


<style>

  /* header-bar style */
        .header-bar{
          height:8vh;
          background-color: {{ $theme->name == 'dark' ? 'rgb(11, 132, 212) !important' : 
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
                      
    /* navbar style **********/

        .navigation-bar{
          
          box-shadow: rgba(9, 30, 66, 0.15) 0px 1px 2px ;
          z-index:999;
          position: -webkit-sticky; 
          position: sticky;
          top: 0;
          background-color: {{ $theme->name == 'dark' ? ' rgb(238, 241, 241)  !important' : ' white !important'  }} ; 


        }
       

          .hover-navlink{
            font-family: 'Montserrat', sans-serif;
          font-weight: 400;
            color:rgb(0, 0, 0);
            transition:0.6s;
            border-bottom:2px solid transparent;
          }

          .hover-navlink:hover{
            color:rgb(11, 97, 184);
            border-bottom:2px solid rgb(11, 97, 184);
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
          display: none !important;
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


      .fixed{
        position:fixed;
        width:100%;
        left:0px;
        top:0px;
        /* background:crimson;*/
      }


  

      .sell-on-hitcom{
        
        color:white;
        text-transform:uppercase;
        font-weight:700;
        font-size:1rem;
        text-shadow:1px 1px rgba(0,0,0,0.6);

          
      }

      @media only screen and (max-width:700px){
                    
      .sell-on-hitcom{
            margin-left:0.1rem !important;
            font-size:0.9rem !important;
              
          }    
          
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
              
        } /* end@media only  */
</style>

<style>
  /*scroll to top */
    #myBtn {
      display: none; /* Hidden by default */
      position: fixed; /* Fixed/sticky position */
      bottom: 34px; /* Place the button at the bottom of the page */
      right: 80px; /* Place the button 30px from the right */
      z-index: 99999; /* Make sure it does not overlap */
      border: none; /* Remove borders */
      outline: none; /* Remove outline */
      background-color: dodgerblue; /* Set a background color */
      color: white; /* Text color */
      cursor: pointer; /* Add a mouse pointer on hover */
      padding: 8px; /* Some padding */
      border-radius: 10px; /* Rounded corners */
      font-size: 18px; /* Increase font size */
      transition: 0.3s ;
    }

    #myBtn:hover {
      background-color: steelblue; /* Add a dark-grey background on hover */
    }


    @media only screen and (max-width:700px){
                  
    #myBtn {

      bottom: 36px
            
        }     
                  
    }

    
      /* end scroll to top */

</style>

<style>

  /*footer css */
  .foot {

    
      color:white;
      background-image: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255,255,255,0.20) 0%, rgba(0,0,0,0.15) 200%),
      url('{{ app()->environment('production') ? asset('public/media/ui/footer/footer.jpg') : asset('media/ui/footer/footer.jpg')}}');
    background-blend-mode: multiply;
      background-size: cover;
      background-repeat:no-repeat;
    }

    .copyright{
    background-color:rgba(0,0,0,0.1);
    }

    /*end footer css */
</style>

        @yield('css')  

    </head>

    <body>

      @if(App::getLocale() === 'ar')
      <style>
        body{

          font-family: 'Noto Naskh Arabic', serif;
          font-size: 18px;
        }

      </style>

      @endif

     @if(app()->environment('production'))
        {{-- <div id="fb-root"></div>

        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
        
          var chatbox = document.getElementById('fb-customer-chat');
          chatbox.setAttribute("page_id", "464147727656938");
          chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <script>
          window.fbAsyncInit = function() {
            FB.init({
              xfbml            : true,
              version          : 'v13.0'
            });
          };

          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script> --}}
      @else

      @endif
 

   
        <div id='app'> {{-- all vue application could be placed in content section --}}

         @include('components.navbar') 

                <div class='container my-2 '>
                     @if(session()->get('success'))
                    <div class='  animate__animated animate__fadeOutUp animate__delay-3s alert alert-success fs-6  py-1 text-center' role="alert"> {{  session()->get('success')}}</div>
                    @endif

                    @if(session()->get('fail'))
                    <div class='animate__animated animate__fadeOutUp animate__delay-3s alert alert-danger fs-6  py-1 text-center' role="alert"> {{  session()->get('fail')}}
                    </div>
                    
                    @endif

                 

                    @if ($errors->any())
                        <div class="animate__animated animate__fadeOutUp animate__delay-3s alert alert-danger  py-1 text-center"  role="alert">
                            <ul class=" list-unstyled py-1 m-0">
                                @foreach ($errors->all() as $error)
                                    <li class='fs-6 py-1'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
       


                
                

         <main class="main">
           <loading-spinner></loading-spinner>
           
           <error-message  language={{ Request()->language }}></error-message>
           <success-message  language={{ Request()->language }}></success-message>

           @yield('content') 
           

         </main>
             
        

        @include('components.footer')

      </div>   {{-- end vue js zone --}}

      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

        <div class='cookie  bg-primary ' style='position:fixed; bottom:0px;left:0px;width:100%'></div> 
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" integrity="sha512-dLxUelApnYxpLt6K2iomGngnHO83iUvZytA3YjDUCjT0HDOHKXnVYdf3hU4JjM8uEhxf9nD1/ey98U3t2vZ0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js" integrity="sha512-wT7uPE7tOP6w4o28u1DN775jYjHQApdBnib5Pho4RB0Pgd9y7eSkAV1BTqQydupYDB9GBhTcQQzyNMPMV3cAew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.30.1/date_fns.min.js" integrity="sha512-F+u8eWHrfY8Xw9BLzZ8rG/0wIvs0y+JyRJrXjp3VjtFPylAEEGwKbua5Ip/oiVhaTDaDs4eU2Xtsxjs/9ag2bQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/uuid@latest/dist/umd/uuidv4.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

        <script src="{{ app()->environment('production') ? asset('public/js/app.js') : asset('js/app.js')}}"></script>
        
     
       

        <script>
                let outputCookie=`
                    <div class=' row container '>
                        <div class='col-12 col-md-6 offset-md-6 p-2'> 
                        <span class='fs-6 text-light '>For a better user experience we are using cookies </span>
                        <button type="button" class=" ms-3 btn btn-secondary cookie-deny btn-sm">Deny</button>
                        <button type="button" class="  ms-3 btn btn-light cookie-allow btn-sm">Allow </button>
                        </div>
                    </div> `

                let cookie=document.querySelector('.cookie')
                

                let cookieRes=Cookies.get('hitcom_cookies');   
                    
                if(!cookieRes){
                
                    cookie.innerHTML=outputCookie;
                    let cookieAllow=document.querySelector('.cookie-allow')
                    let cookieDeny =document.querySelector('.cookie-deny')
                    cookieAllow.addEventListener('click', ()=>{Cookies.set('hitcom_cookies', 'allow-cookies'); outputCookie=``;cookie.style.display='none' })
                    cookieDeny.addEventListener('click', ()=>{Cookies.set('hitcom_cookies', 'deny-cookies'); outputCookie=``;cookie.style.display='none'})

                }



      // end cookies script

        </script>



<script>
  // navbar script
  
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
  // end navbar script
  </script>

<script>

  //scroll to top :
  mybutton = document.getElementById("myBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
       // console.log('visible scrolltotop')
    } else {
        mybutton.style.display = "none";
      //  console.log('hidden scrolltotop')
    }

  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
//end scroll to top :
</script>

       
     @yield('js')

    
    
    </body>
</html>
