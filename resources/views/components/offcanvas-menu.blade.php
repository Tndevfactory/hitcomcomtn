<a class="btn btn-outline-secondary d-lg-none d-block btn-sm ms-1 " 
  type="button"
  data-bs-toggle="offcanvas" 
  data-bs-target="#offcanvasWithBackdrop"
  aria-controls="offcanvasWithBackdrop">
<i class="fas fa-bars"></i> 
</a>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
   
    <h5 class="offcanvas-title text-uppercase " id="offcanvasWithBackdropLabel">
      <a class="text-decoration-none  navbar-brand"  href="{{ route('home', App::getLocale())}}"> 

          <img src='{{ app()->environment('production') ? asset('public/media/ui/logo/hitcom-logo.jpg') : asset('media/ui/logo/hitcom-logo.jpg')}}' 
              style='width:2.3rem;height:2.3rem; border-radius:50%; border:2px #fff solid;padding:0px; margin-top:-6px;' alt=''/>

          <span class='text-lead h4 text-uppercase products-title  d-inline-block '>  {{ __('hitcom') }}</span>
          
        </a>
    
    </h5>
    
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body bg-white">

            <div class="accordion" id="accordionExample">

              @foreach ($menu_categories as $category)
                  
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button"
                   data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $category->id }}" aria-expanded="true" aria-controls="collapseOne">
                  
                      <a href='{{ route('show-category' ,
                    ['slug'=> $category->category_slug ?? 'table' , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}' 
                    class='text-decoration-none text-capitalize text-dark  ' > 
                    
                      <i class="{{ $category->icon }} me-2"></i> 

                      @if(App::getLocale() === 'fr')
                          {{ $category->fr_category_name }}

                          @elseif(App::getLocale() === 'en')
                            {{ $category->en_category_name }}
                          @else
                            {{ $category->ar_category_name }}
                          @endif 

                    </a> 

                  </button>
                </h2>


                <div id="collapseOne{{ $category->id  }}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    
                   
                      <ul class=' list-unstyled'>
                                @foreach ($category->subcategories as $subcategory)
                                  <li class='text-dark mb-3'>
                                    <a href='{{ route('show-subcategory', ['slug'=> $subcategory->subcategory_slug, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' 
                                    class='text-white text-decoration-none d-flex justify-content-start align-items-center mb-1  list-item'> 
                                    <i class="fas {{App::getLocale() === 'ar' ? 'fa-chevron-left' : 'fa-chevron-right'}} text-dark me-1" style='font-size:0.5rem'></i> 
                                      <span class='text-dark' style='font-size:0.9rem'>
                                      
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

              </div>

               @endforeach

               <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button"  aria-expanded="true" aria-controls="collapseOne">
                   <i class="fa-solid fa-people-arrows-left-right me-2 text-dark"></i>
                    
                    <a class="text-decoration-none text-dark text-capitalize" href="{{ route('about-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}"
                        > {{ __('about us') }}  
                    </a> 

                  </button>
                </h2>
                <div id="collapseOnec1" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  nothing
                  </div>
                </div>
              </div>

               <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button"  aria-expanded="true" aria-controls="collapseOne">
                   
                    <i class="fa-solid fa-file-signature me-2 text-dark"></i> 
                    
                    <a class="text-decoration-none text-dark  text-capitalize" href="{{ route('contact-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}"
                        > {{ __('contact us') }}  
                    </a> 

                  </button>
                </h2>
                <div id="collapseOnec1" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  nothing
                  </div>
                </div>
              </div>

               <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button"  aria-expanded="true" aria-controls="collapseOne">
                   <i class="fa-solid fa-circle-info  me-2 text-dark""></i>
                    
                    <a class="text-decoration-none text-dark  text-capitalize" href="{{ route('contact-us', ['currency' => session()->get('currency'), 'language' => Request()->language]) }}"
                        > {{ __('faq') }}  
                    </a> 

                  </button>
                </h2>
                <div id="collapseOnec1" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  nothing
                  </div>
                </div>
              </div>

              
              
              
            </div>







  </div>
</div>

