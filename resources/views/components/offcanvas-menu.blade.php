<a class="btn btn-outline-secondary d-md-none d-block btn-sm " 
  type="button"
  data-bs-toggle="offcanvas" 
  data-bs-target="#offcanvasWithBackdrop"
  aria-controls="offcanvasWithBackdrop">
<i class="fas fa-bars"></i> 
</a>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-uppercase " id="offcanvasWithBackdropLabel">{{ __('hitcom') }}</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body bg-dark">

  
    
    @foreach ($menu_categories as $category)
           <div class='  text-white text-start ' > 
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

