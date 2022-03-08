<!DOCTYPE html>
       
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('meta')
        <title>Hitcom | @yield('title')</title>

      <link rel="icon"  type="image/x-icon" 
      href="{{ app()->environment('production') ? asset('public/favicon.ico') : asset('favicon.ico')  }}"/>
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <link  rel="stylesheet"  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        
         @if (App::getLocale() == 'ar')

             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

        @endif

<style>
* {
    padding:0;
    margin:0;
    box-sizing:border-box;
    
}
body{
    font-family: 'Roboto', sans-serif;
    font-size: 17px;
    color:#222;
    line-height:26px;
}
.categories-title{
  background-color: #666666;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
    font-weight: 900;
     letter-spacing:1px;
    font-size:1.5rem;

}
.products-title{
  background-color: #666666;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
    font-weight: 900;
    letter-spacing:1px;
    font-size:1.5rem;
}
</style>

         

    </head>

    <body>

     {{-- <!-- Messenger Chat plugin Code --> --}}
    <div id="fb-root"></div>

    {{-- <!-- Your Chat plugin code --> --}}
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
    
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "464147727656938");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    {{-- <!-- Your SDK code --> --}}
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
    </script>
 


     @yield('css')

        @if (App::getLocale() == 'ar')
            
                  <style>
                        body{
                        font-family: 'Tajawal', sans-serif;
                        }
                    </style>

        @endif

           

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
       
        @yield('content') 

          
          
           <div class='cookie  bg-primary ' style='position:fixed; bottom:0px;left:0px;width:100%'></div>
        

        @include('components.scroll-to-top') 
        @include('components.footer')

      

       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" integrity="sha512-dLxUelApnYxpLt6K2iomGngnHO83iUvZytA3YjDUCjT0HDOHKXnVYdf3hU4JjM8uEhxf9nD1/ey98U3t2vZ0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js" integrity="sha512-wT7uPE7tOP6w4o28u1DN775jYjHQApdBnib5Pho4RB0Pgd9y7eSkAV1BTqQydupYDB9GBhTcQQzyNMPMV3cAew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/uuid@latest/dist/umd/uuidv4.min.js"></script>
        
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

        </script>
       
     @yield('js')

     @stack('script')
    
    </body>
</html>
