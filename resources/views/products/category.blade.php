@extends('base')

@section('meta')
 <meta name="author" content="ch">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base-url" content="{{ config('app.url') }}">

 
@endsection

@section('title', 'category')



@section('css')
<style> 


.checked {
  color: orange;
}

.card-categorie{
     box-shadow: 1px 1px 8px rgba(0,0,0,0.3);
    transition: .15s ;

}
.card-categorie:hover{
    box-shadow: 1px 1px 18px rgba(0,0,0,0.6);
}
.card-product{
    position:relative;
   
      transition: .15s ;

}

.control-btn{
    position:absolute;
    width:100%;
    height:100%;
    padding:.7rem;
    display:flex;
    justify-content:center;
    align-items:center;
    inset:0;
    background-color:rgba(0,0,0,0.15);
    opacity:0;
    transition: .3s ease-in-out;
}
.card-product:hover .control-btn{
    opacity:1;
    cursor:pointer;
    
    
}


.card-body h5{
 color:#444;
}
.card-body p{
 color:#666;
 font-size:.9rem;
}
.price{
    color:#444;
    display:flex;
    justify-content:space-between;
    font-size:.9rem;
}





.clear-filter-section{
  visibility:hidden ;
  display:flex;
  justify-Content: end;
  margin-bottom : -1.4rem;
  
}

.swiper {
  width: auto;
  height: auto;
 
  
}
.swiper-slide{
 cursor:pointer;
}

@media (max-width:700px){
  .swiper {
  display:none;
   }
}


</style>
@endsection

@section('content')

<div class='container  my-3'>

<form method='GET' action='{{ route('filter-category' , ['slug'=> $category->category_slug , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}'> {{-- form for filters select--}}

<input type='hidden' value="{{ Request()->get('currency') }}"  name='currency' />
<input type='hidden' value="{{ $category->category_slug  }}"  name='category_slug' />


@isset($subcategory)
<input type='hidden' value="{{ $subcategory->subcategory_slug}}"  name='subcategory_slug' />
@endisset

  <div class='row row-cols-1 row-cols-md-2' >

      <div class='col-12 col-md-9'>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize"><a class='text-decoration-none' 
            href="{{ route('show-category' , ['slug'=> $category->category_slug , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}">
            
                               @if(App::getLocale() === 'fr')
                                {{ $category->fr_category_name }} 

                                  @elseif(App::getLocale() === 'en')
                                    {{ $category->en_category_name }} 
                                  @else
                                  {{ $category->ar_category_name }} 
                                  @endif 

            
            </a></li>

@isset($subcategory)

            <li class="breadcrumb-item active  text-capitalize" aria-current="page">
            
             @if(App::getLocale() === 'fr')
                                {{ $subcategory->fr_subcategory_name }} 

                                  @elseif(App::getLocale() === 'en')
                                    {{ $subcategory->en_subcategory_name }} 
                                  @else
                                  {{ $subcategory->ar_subcategory_name }} 
                                  @endif 
            
            </li>

@endisset

          </ol>
        </nav>

        <span class='category' data-categoryslug= {{ Request()->slug }}> </span>
        <span class='lang' data-lang= {{ Request()->language }}> </span>
      </div>


    <div class='col-12 col-md-3'>
        <select class="form-select form-select-sm mb-2 mb-md-0 filtres tri text-capitalize" name='tri' onchange="this.form.submit()">{{-- by filtre select--}}
          <option selected disabled>{{ __('product filters') }}</option>
          <option value="price_ascending" class='mb-1' {{ Request()->get('tri')  == 'price_ascending' ? 'selected' : '' }} >{{ __('ascendant price') }}</option>
          <option value="price_descending"  class='mb-1'  {{ Request()->get('tri')  == 'price_descending' ? 'selected' : '' }} >{{ __('descendant price') }}</option>
          <option value="name_ascending"  class='mb-1'  {{ Request()->get('tri')  == 'name_ascending' ? 'selected' : '' }}>{{ __('by name A-Z') }}</option>
          <option value="name_descending"  class='mb-1'  {{ Request()->get('tri')  == 'name_descending' ? 'selected' : '' }}>{{ __('by name Z-A') }}</option>
        </select>
    </div>

  </div>

  <div class='row row-cols-1 row-cols-md-2' style='min-height:100vh'>

    <div class='col-12 col-md-3 ' style='background:#ddd'>

        <div class='filtres pt-1 ' style='background:#ddd; '>

        <div class='clear-filter-section'>
         <button class='btn btn-sm btn-default clear-filter-btn text-capitalize text-muted fw-thin'> {{ __('clear filters') }}
          <i class="fa-solid fa-trash-can"></i></button>
        </div>

        <span class='fs-6 ms-1 mb-1 mt-n2 text-capitalize  d-inline-block '>{{ __('subcategories') }} </span>
            <ul class="list-group subcategories">
                    @forelse  ($subcategories as $subcategory)
                        <li class="list-group-item">
                          
                            <a class="text-decoration-none subcategory" 
                            href="{{ route('show-subcategory', ['slug'=> $subcategory->subcategory_slug, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}" >
                               @if(App::getLocale() === 'fr')
                                {{ $subcategory->fr_subcategory_name }} 

                                  @elseif(App::getLocale() === 'en')
                                    {{ $subcategory->en_subcategory_name }} 
                                  @else
                                  {{ $subcategory->ar_subcategory_name }} 
                                  @endif 

                              
                              </a>
                                <span class='ms-1 fw-leight' style='font-size:0.8rem'> ({{ $subcategory->products()->count() }}) </span>
                            
                         
                        </li>  
                    @empty
                        <li class="list-group-item" aria-current="page">

                         @if(App::getLocale() === 'fr')
                                {{ $subcategory->fr_subcategory_name }} 

                                  @elseif(App::getLocale() === 'en')
                                    {{ $subcategory->en_subcategory_name }} 
                                  @else
                                  {{ $subcategory->ar_subcategory_name }} 
                                  @endif 
                        
                         <span class='ms-1 fw-leight' style='font-size:0.8rem'> ({{ $subcategory->products()->count() }}) </span>
                         
                         </li>
                    @endforelse
              </ul>

        <span class='fs-6 mt-2 mb-1 d-inline-block ms-1 text-capitalize'> {{ __('ratings') }}</span> {{-- rating filtre --}}
              <ul class="list-group  best-sellers">
                  
                     
                        <li class="list-group-item">
                           <div class="form-check">
                            <input class="form-check-input rating rating5" {{ Request()->has('rating5') ? 'checked' : ''}} name="rating5" value ="5" type="checkbox"  onchange="this.form.submit()">
                            <label class="form-check-label" for="flexCheckDefault">
                                @for ($i =0 ; $i <5; $i++)
                                    <span class="fa fa-star text-warning fs-6"></span>
                                @endfor
                            </label>
                          </div>
                        </li>
                  
                        <li class="list-group-item">
                           <div class="form-check">
                            <input class="form-check-input rating rating4" {{ Request()->has('rating4') ? 'checked' : ''}} name="rating4" value = "4"  type="checkbox"  onchange="this.form.submit()" >
                            <label class="form-check-label" for="flexCheckDefault">
                                 @for ($i =0 ; $i <4; $i++)
                                    <span class="fa fa-star text-warning fs-6"></span>
                                @endfor
                            </label>
                          </div>
                        </li>
                  
                        <li class="list-group-item">
                           <div class="form-check">
                            <input class="form-check-input rating rating3" {{ Request()->has('rating3') ? 'checked' : ''}}  name="rating3" value = "3"  type="checkbox"  onchange="this.form.submit()">
                            <label class="form-check-label" for="flexCheckDefault">
                                 @for ($i =0 ; $i <3; $i++)
                                    <span class="fa fa-star text-warning fs-6"></span>
                                @endfor
                            </label>
                          </div>
                        </li>

             </ul>

             <label for="priceRange" class="form-label fs-6 mt-2 mb-1 d-inline-block ms-1 text-capitalize">{{ __('price range') }}</label>{{-- range filtre --}}
            
              <ul class="list-group subcategories">

                <li class="list-group-item">

                <div class='d-flex justify-content-between align-items-center'>
                  <output name="amount_min" id="amountMin" for="rangeInputMin" class='fs-6 text-muted ms-1 d-inline-block'>{{ Request()->has('min_price') ? Request()->get('min_price')  : '0' }}</output>
                  <output name="amount_max" id="amountMax" for="rangeInputMax" class='fs-6  text-muted me-1 d-inline-block'>{{ Request()->has('max_price') ? Request()->get('max_price')  : '0' }}</output>
                </div>

                <div class='d-flex justify-content-between align-items-center'>
                  <input type="range" id="rangeInputMin" name="min_price" min="0" max="5000" value="{{ Request()->has('min_price') ? Request()->get('min_price')  : '0' }}" step='100' data-key='pricerange'  onchange="this.form.submit()"
                  class="form-range pricerange"  oninput="amountMin.value=rangeInputMin.value" />    

                  <input type="range" id="rangeInputMax" name="max_price" min="5001" max="10000" data-value='8' value="{{ Request()->has('max_price') ? Request()->get('max_price')  : '0' }}" step='100' data-key='pricerange'  onchange="this.form.submit()"
                  class="form-range pricerange"  oninput="amountMax.value=rangeInputMax.value" />  
                </div>

                </li>

              </ul>

        </div>  {{-- end filter --}}
      
      </form>
     
    </div> {{-- end col --}}

    <div class='col-12 col-md-9 '>
        <div class='categorie-subcategories-products row row-cols-1 row-cols-md-4 g-3 '> {{-- products --}}
         
          @foreach ($products as $product)
              <div class="col">
                  <div class="card card-product h-100 shadow-sm ">

                  {{-- @php
                  echo $product->images[0]->product_image;
                  @endphp --}}

                   <img src="{{ app()->environment('production') ? asset(isset($product->images[0]->product_image) ? 'public/'.$product->images[0]->product_image : 'public/media/products/support.png') :
         asset(isset($product->images[0]->product_image) ? $product->images[0]->product_image : 'media/products/support.png')}}"
         class="card-img-top" alt="...">

                 
                  <div class="card-body">
                      <h5 class="card-title text-uppercase " style='color:#666;font-size:0.8rem'>
                      <div class='text-muted mb-1' style='font-size:0.8rem;font-weight:300'>[ {{ $product->id }} ] </div>  
                              @if(App::getLocale() === 'fr')
                              {{ $product->fr_product_name }}    <span class=' ms-1 {{ $product->status === 'available' ? 'text-success' : 'text-danger'}} ' style='font-size:0.8rem;font-weight:400'> 
                                                                                    {{ $product->status === 'available' ? 'en stock' : 'non disponible'}} </span>  

                                  @elseif(App::getLocale() === 'en')
                                    {{ $product->en_product_name }}    <span class=' ms-1  {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ' style='font-size:0.8rem;font-weight:400'>
                                                                                          {{ $product->status === 'available' ? 'available' : ' not available' }} </span>  
                                  @else
                                    {{ $product->ar_product_name }}    <span class=' ms-1 {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ' style='font-size:0.8rem;font-weight:500'> 
                                                                                          {{ $product->status !== 'available' ? 'غير متوفر' : 'متوفر' }} </span>  
                                  @endif 
                      
                      
                      </h5>
                      <span>
                      @for ($i = 0; $i < 5; $i++)
                          @if (floor($product->avg_rating ) - $i >= 1)
                              {{--Full Start--}}
                              <span class="fa fa-star " style='font-size:1rem;color:#FF9529'></span>
                          @elseif ($product->avg_rating  - $i > 0)
                              {{--Half Start--}}
                              <span class="fa-solid fa-star-half-stroke" style='font-size:1rem;color:#FF9529'></span>
                          @else
                              {{--Empty Start--}}
                            <span class="fa fa-star " style='font-size:1rem;color:#eee'></span>
                          @endif
                      @endfor
                      </span>

                      <span class="text-decoration-none"style='font-size:0.9rem;color:#888'>(<span style='font-size:0.8rem;color:#555'>{{ $product->comment_count }}</span>)</span>
                      
                      <p class="card-text">
                      
                        @if(App::getLocale() === 'fr')
                                  {{ Str::limit($product->fr_description , 25)}}

                                  @elseif(App::getLocale() === 'en')
                                    {{ Str::limit($product->en_description , 25)}}
                                  @else
                                    {{ Str::limit($product->ar_description , 25)}}
                                  @endif 
                      
                      </p>
                      <div class='price d-flex justify-content-between align-items-center'>

                      <span class="card-text">

                          
                            <span class='fw-bold text-success fs-6'>  
                                @if (Session::get('currency') == 'dollar')  
                                ${{ number_format($product->price,2,'.',',') }}
                                  @else  {{ number_format($product->euro_price,2,',',' ') }}€ 
                                @endif
                            </span> 
                        
                      
                      </span>

                    @if($product->discount != '0')
                    
                              @if(App::getLocale() === 'fr')
                              
                                <span class="card-text badge text-white d-flex justify-content-center align-items-center" 
                                    style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.7rem;background-color: #FE472C; height:1.8rem;width:1.8rem;border-radius:50%' >
                                  -{{ number_format($product->discount,0,'.',',') }}%
                                </span>

                              @elseif(App::getLocale() === 'en')
                                <span class="card-text badge  text-white  d-flex justify-content-center align-items-center" 
                                    style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.7rem;background-color: #FE472C; height:1.8rem;width:1.8rem;border-radius:50%' >
                                  -{{ number_format($product->discount,0,'.',',') }}%
                                </span>
                              @else
                                <span class="card-text badge text-white d-flex justify-content-center align-items-center " 
                                    style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.7rem;background-color: #FE472C; height:1.8rem;width:1.8rem;border-radius:50%' dir='ltr'>
                                -{{ number_format($product->discount,0,'.',',') }}%
                                </span>
                              @endif 
                        
                      </span>
                      @endif 

                      </div>
                       <div class='control-btnt d-flex justify-content-center mt-3'>

                            <div class="btn-group" role="group" aria-label="Basic example">

                              <a href='{{ route('show-product' , ['slug'=> $product->product_slug , 'language' => App::getLocale()])}}' 
                              class='btn btn-white' title='see details'> <span class="fas fa-eye text-info"></span> </a>

                              <a href='{{ route('add-to-cart', ['user_id' => Auth::id(), 'id'=> $product->id, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' 
                                class='btn btn-white text-capitalize' title='add to cart'><span class="ms-1 fas fa-cart-plus text-success"></span>
                              </a>

                              <a href='{{ route('add-to-wishlist', ['product_id' => $product->id , 'user_id'=> Auth::id(), 'language'=> App::getLocale()]) }}'
                              class='btn btn-white' title='{{ App::getLocale() == 'fr' ?  'ajouter a la liste d\'envie': 'add to wishlist' }}'> <span class="fas fa-heart text-danger "></span></a>

                          </div>
                       </div>
                  </div>
                  </div>
              </div> 
              @endforeach

          

        </div>
    </div>
  </div>

    {{-- <div class=' products row row-cols-1 row-cols-md-4 g-3'></div> ajax request --}}
  
</div> {{-- end global container --}}


<div class="pagination justify-content-center mt-4">
    {{ $products->links() }}
</div>



<div class='container carousel my-3'>
  <h3 class='text-center mt-5 mb-3 products-title text-uppercase'>  {{ __('wishlist') }} </h3>

    <div class="swiper">
      
      <div class="swiper-wrapper">
      
        @for ($i =0 ; $i < 5 ; $i++)
          <div class="swiper-slide">
              <a href='#'> 
                <img src="{{ app()->environment('production') ? asset('public/media/products/wood-bol-product-img-thumb.png') : asset('media/products/wood-bol-product-img-thumb.png')}}" class="img-fluid" alt="...">
                </a>
          </div>
        @endfor
        
      </div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    
    </div>

</div>

@endsection


@section('js')

<script>
 
const swiper = new Swiper('.swiper',
 {
  loop: true,
   speed: 400,
  spaceBetween: 8,
  autoplay: {
   delay: 2000,
 },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  
  
  breakpoints: {
       // when window width is >= 640px
    640: {
      slidesPerView: 4,
      
    }
  }
});

swiper.on('click', function (swiper, event) {
  console.log('slide clicked', event);
});


   

</script>


@endsection