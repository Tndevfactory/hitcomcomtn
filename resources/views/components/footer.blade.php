
<footer class=" foot pt-1 px-5" style=''>
  
 <div class="container-fluid mt-3 py-3">


  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-6">

    <div class="col  col-md-4">
      <div class='d-flex flex-column justify-content-start align-items-start'> 
        <h4 class='text-start fs-2  me-auto ms-0 text-uppercase '>
         <img src='{{ app()->environment('production') ? asset('public/media/ui/logo/hitcom-logo.jpg') : asset('media/ui/logo/hitcom-logo.jpg')}}' 
         style='width:3rem;height:3rem; border-radius:50%; border:1px #fff solid;padding:1px' alt=''/>
         <span style='color:dodgerblue'>{{ __('hitcom') }} </span>
         </h4>
        
          <span class=' d-inline-block ms-5' style='font-size:0.9rem '> 
             <span class='d-block'> <span class='fw-bold text-capitalize'>{{ __('email') }}: </span>
             <a class='text-decoration-none text-white' href="mailto:admin@hitcom.com.tn">admin@hitcom.com.tn</a></span>
             <span class='d-block'> <span class='fw-bold text-capitalize'>{{ __('telephone') }}: </span>0021652215004</span>
             <span class='d-block'> <span class='fw-bold text-capitalize'>{{ __('compagny') }}: </span>STE HORIZON INT TR COMP IMP EXP HITCOM</span>
             <span class='d-block'> <span class='fw-bold text-capitalize'>{{ __('tax registration number') }}: </span> 1589605/Y</span>
             
        </span>
      </div>
    </div>
    
  

    @foreach ($menu_categories as $category)
           <div class=' col text-white text-start mt-4 mt-md-0 ' > 
                  <a href='{{ route('show-category' ,
                   ['slug'=> $category->category_slug ?? 'table' , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}' 
                  class='text-decoration-none text-capitalize text-white  ' > 
                  
                    @if(App::getLocale() === 'fr')
                        {{ $category->fr_category_name }}

                        @elseif(App::getLocale() === 'en')
                          {{ $category->en_category_name }}
                        @else
                          {{ $category->ar_category_name }}
                        @endif 

                   {{-- <i class="fa-solid  {{App::getLocale() === 'ar' ? 'fa-chevron-left' : 'fa-chevron-right'}}" style='font-size:0.6rem'></i> --}}
                   </a> 
                     <div class='text-white '>
                          <ul class=' list-unstyled'>
                                @foreach ($category->subcategories as $subcategory)
                                  <li class='text-white'>
                                    <a href='{{ route('show-subcategory', ['slug'=> $subcategory->subcategory_slug, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' 
                                    class='text-white text-decoration-none d-flex justify-content-start align-items-center mb-1  list-item'> 
                                    <i class="fas {{App::getLocale() === 'ar' ? 'fa-chevron-left' : 'fa-chevron-right'}} text-white me-1" style='font-size:0.5rem'></i> 
                                      <span class='' style='font-size:0.9rem'>
                                      
                                          @if(App::getLocale() === 'fr')
                                            {{ $subcategory->fr_subcategory_name }} 

                                              @elseif(App::getLocale() === 'en')
                                                {{ $subcategory->en_subcategory_name }} 
                                              @else
                                              {{ $subcategory->ar_subcategory_name }} 
                                              @endif 
                                      
                                      </span>
                                    </a>
                                  </li>  
                                @endforeach 
                          </ul>
                     </div>
                </div>
      @endforeach 
   </div>
 </div>
 
      

<div class=' copyright  d-flex justify-content-center align-items-center py-3 py-md-1'>
  <div class="container-fluid pb-2">
    <div class="row row-cols-1 row-cols-md-3 align-items-center">

    
      <div class="col"> 
          <div class='text-center'>
          <span class='' style='font-size:0.75rem pb-3'>
         
          <a href='' class='text-decoration-none'>
           <img src='{{ app()->environment('production') ? asset('public/media/ui/social-media/facebook.png') : asset('media/ui/social-media/facebook.png')}}'
            alt='social media' style='height:2rem;width:2rem'/>
          </a>

          <a href='' class='text-decoration-none ms-4'>
           <img src='{{ app()->environment('production') ? asset('public/media/ui/social-media/whatsapp.png') : asset('media/ui/social-media/whatsapp.png')}}'
            alt='social media' style='height:2rem;width:2rem'/>
          </a>
          
          </span>
          </div>
      </div>

      <div class="col">
          <div class='text-center'>
          <span class='' style='font-size:0.65rem'>   Copyright © {{ date('Y') }} <span style='color:greenyellow'> tndevart </span> </span>
          
          </div>
      </div>

      <div class="col"> 
          <div class='text-center'>
          <span class='d-flex justify-content-center  ' style='font-size:0.75rem'> 
          
          
            <ul class=" list-unstyled me-5">
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
          
          
          <ul class="list-unstyled ms-2">
       
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
                <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['fr', 'slug' => Request()->slug]) }}">🇨🇵</a></li>
                <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['en', 'slug' => Request()->slug]) }}">🇬🇧</a></li>
                <li class='language-item'><a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['ar', 'slug' => Request()->slug]) }}">🇦🇪</a></li>
              </ul>
            </li>
          </ul> 
          
          </span>
          
          </div>
      </div>

    </div>
  </div>
</div>
  
</footer>