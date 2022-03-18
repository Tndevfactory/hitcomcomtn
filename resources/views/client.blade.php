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
</style>

         @yield('css')

        

    </head>

    <body>


        @include('components.office.navbar')

         <div class='container my-2 '>
                    @if(session()->get('success'))
                    <div class='alert alert-success' role="alert"> {{  session()->get('success')}}</div>
                    @endif

                    @if(session()->get('fail'))
                    <div class='alert alert-danger' role="alert"> {{  session()->get('fail')}}</div>
                    @endif

                 

                    @if ($errors->any())
                        <div class="alert alert-danger mb-1"  role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
          </div>
          <div class='container-fluid bg-light'> 
    <div class='row' style='min-height:100vh'> 
        <div class='col-2 d-none d-md-block'> 

       
            <ul class="list-group mt-2">
                <li class="list-group-item active" aria-current="true">
                  <a class="text-decoration-none fs-6 text-primary btn btn-light" href="{{ route('home', App::getLocale())}}"> {{ __('back to shop') }}</a>
                </li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
       
       
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Products</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
       
       
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Orders</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
       
       
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Profil</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
       
           

        </div>
        <div class='col-10 bg-light '> 
            @yield('content')

        </div>
    </div>
 </div>

         

        
        @include('components.office.footer')

      

        @yield('js')
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
