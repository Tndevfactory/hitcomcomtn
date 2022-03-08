<!DOCTYPE html>
        @php
         $lang = app()->getLocale();
         @endphp

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('meta')
        <title>Hitcom | @yield('title')</title>

        <!-- Fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
         @if ($lang === 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        @endif

<style>
* {
    padding:0;
    margin:0;
    box-sizing:border-box;
    
}
body{
    font-family:roboto;
    font-size: 17px;
    color:#222;
    line-height:26px;
    
}
.hover{
    color:#444;
    transition:0.3s;
}
.hover:hover{
    color:dodgerblue;
}
</style>

         @yield('css')

        

    </head>

    <body>


        @include('components.office.navbar')

          <div class='container-fluid my-2 p-0'>
                    @if(session()->get('success'))
                    <div class='alert alert-success fs-6  p-0 text-center' role="alert"> {{  session()->get('success')}}</div>
                    @endif

                    @if(session()->get('fail'))
                    <div class='alert alert-danger fs-6  p-0 text-center' role="alert"> {{  session()->get('fail')}}</div>
                    @endif

                 

                    @if ($errors->any())
                        <div class="alert alert-danger  p-0 text-center"  role="alert">
                            <ul class=" list-unstyled p-1 m-0">
                                @foreach ($errors->all() as $error)
                                    <li class='fs-6 p-1'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
          </div>

        <div class='container-fluid bg-light'> 
    <div class='row' style='min-height:100vh'> 
        <div class='col-2 d-none d-md-block position-fixed'> 

       
            <ul class="list-group mt-2">
               <li class="list-group-item bg-info py-1" aria-current="true">
                  <a class="text-decoration-none fs-6 text-light  fw-bolder" href="{{ route('home', App::getLocale())}}"> 
                  <i class="fa-solid fa-chalkboard-user"></i> {{ __('back to shop') }}
                  </a>
                </li>
            </ul>
            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                     <i class="fa-solid fa-user-group"></i><span class='ms-2 fw-bold '>Users</span>
                </li>
                <li class="list-group-item py-1"> 
                    <a href='{{ route('admin-users-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}'
                     class='fs-6 text-decoration-none hover'>Manage Users</a>
                </li>
                <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-shops-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover text-capitalize'>
                   {{ __('manage retailers') }} 
                    </a>
                </li>
            </ul>
       
            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                     <i class="fa-solid fa-bag-shopping"></i><span class='ms-2 fw-bold '>Products</span>
                </li>
                <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-stock-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover text-capitalize'>
                   {{ __('manage stock') }} 
                    </a>
                </li>
                <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-categories-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}"
                     class='fs-6 text-decoration-none hover text-capitalize'>
                    {{ __('manage categorie') }} 
                    </a>
                </li>
                <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-subcategories-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover text-capitalize'>
                    {{ __('manage subcategories') }} 
                    </a>
                </li>
                

                <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-products-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover'>
                    Manage Products</a>
                </li>
               
               
            </ul>
       
            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                     <i class="fa-solid fa-border-top-left"></i><span class='ms-2 fw-bold '>Orders</span>
                </li>
                <li class="list-group-item py-1"> 
                    <a href='{{ route('admin-orders-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}' class='fs-6 text-decoration-none hover'>
                    Manage Orders</a>
                </li>
                 <li class="list-group-item py-1"> 
                    <a href='{{ route('admin-coupons-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}' class='fs-6 text-decoration-none hover'>
                    Manage Coupons</a>
                </li>
                 <li class="list-group-item py-1"> 
                    <a href='{{ route('admin-taxes-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}' class='fs-6 text-decoration-none hover'>
                    Manage Tax</a>
                </li>
            </ul>

            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                     <i class="fa-solid fa-dumpster"></i><span class='ms-2 fw-bold '>Commercial compaign</span>
                </li>
                <li class="list-group-item py-1"> 
                    <a href='#' class='fs-6 text-decoration-none hover'>Flash sale</a>
                </li>
                <li class="list-group-item py-1"> 
                    <a href='#' class='fs-6 text-decoration-none hover'>Manage UI</a>
                </li>
            </ul>
           
           
            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                    <i class="fa-solid fa-bell"></i><span class='ms-2 fw-bold '>Notifications</span>
                </li>

                 <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover'>
                    Manage Notifications</a>
                </li>
            </ul>
       
            <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                    <i class="fa-solid fa-square-poll-vertical"></i><span class='ms-2 fw-bold '>Analytics</span>
                </li>

                 <li class="list-group-item py-1"> 
                    <a href="{{ route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
                    class='fs-6 text-decoration-none hover'>
                    Sales charts</a>
                </li>
            </ul>
       
             <ul class="list-group mt-2">
                <li class="list-group-item active fs-6 py-1 " aria-current="true">
                     <i class="fa-solid fa-screwdriver-wrench"></i><span class='ms-2 fw-bold '>Admin</span>
                </li>
                <li class="list-group-item py-1"> 
                    <a href='{{ route('admin-manage-profile', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}' class='fs-6 text-decoration-none hover'>Manage Admin profile</a>
                </li>
            </ul>
       
           

        </div>
        <div class='col-10 bg-light offset-2'> 
            @yield('content')

        </div>
    </div>
 </div>
        

         

        @include('components.scroll-to-top')
        @include('components.office.footer')

      

        @yield('js')
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
