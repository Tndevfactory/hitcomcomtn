@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'seller')


@section('css')
<style>

</style>
@endsection


@section('content')

<div class='container my-3'>
 <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            
            <li class="breadcrumb-item active  text-capitalize" aria-current="page">
            
                   @if(App::getLocale() === 'fr')
                     {{ $shop->fr_shop_name }}  

                        @elseif(App::getLocale() === 'en')
                          {{ $shop->en_shop_name }}  
                        @else
                          {{ $shop->ar_shop_name }}   
                         
                        @endif 
            
            </li>
          </ol>
    </nav>
    <div class='row row-cols-1 row-cols-md-2 product-details'>

        <div class='col d-flex justify-content-center'>
        <img id='imgScreen' src="{{ app()->environment('production') ? asset(isset($shop->shop_image) ? 'public/'.$shop->shop_image : 'public/media/products/support.png') :
         asset(isset($shop->shop_image) ? $shop->shop_image : 'media/products/support.png')}}"
         class="card-img-top" alt="...">
       
        </div>



        <div class='col'>
            <ul class="list-group border border-0">
            <li class="list-group-item text-uppercase text-primary fw-bold border border-0 ">
           
                     @if(App::getLocale() === 'fr')
                           
                         {{ $shop->fr_shop_name }}  

                        @elseif(App::getLocale() === 'en')
                          {{ $shop->en_shop_name }}  
                        @else
                          {{ $shop->ar_shop_name }}   
                         
                        @endif 
            </li>
            <li class="list-group-item border border-0 ms-1" style='font-size:0.9rem'>
                      @if(App::getLocale() === 'fr')
                         {{ $shop->fr_description }}  

                        @elseif(App::getLocale() === 'en')
                          {{ $shop->en_description }}  
                        @else
                          {{ $shop->ar_description  }}   
                         
                        @endif 
            
            </li>

            <li class="list-group-item border border-0" style='font-size:0.9rem'>

            <div class='d-flex justify-content-between align-items-center'>
                    <div>
                        <a href='{{ route('add-to-wishlist', ['product_id' => $shop->id , 'user_id'=> Auth::id(), 'language'=> App::getLocale()]) }}'
                        class='text-decoration-none text-capitalize m-0 p-0 text-dark fw-bold' title='add to wishlist'> add to wishlist <span class="fas fa-heart text-danger "></span></a>
                    </div>
                    
                    <div>
                       

                        {{-- @if($shop->discount !== '0.00')
                         <span class='text-capitalize d-inline fw-bold '> Discount: <span class='text-success'>
                         -{{ number_format($shop->discount,0,'.',',')  }}% </span></span>
                         @else
                             {{ '' }}
                         @endif --}}
                        
                        
                    </div>

              </div>
             

            </li>

            <li class="list-group-item border border-0" style='font-size:0.9rem'>
                <div class='d-flex justify-content-between align-items-center'>
                    
                    <div>
                        <span class='text-capitalize fw-bold'> Status:</span>
                        <span class=' text-uppercase '>
                                {{-- <span class=' {{ $shop->status === 'available' ? 'text-success' : 'text-danger'}}  ms-1' style='font-size:0.8rem;font-weight:400'> {{ $shop->status === 'available' ? 'en stock' : 'non disponible'}} </span> --}}

                        </span>
                    </div>
                    

                    <div class=''>
                            <span class='text-capitalize fw-bold'>{{ __('product rating') }}</span>
                            <span class="fs-6 ms-1 badge">
                            
                             {{-- @for ($i = 0; $i < 5; $i++) --}}
                                {{-- @if (floor($shop_rating->avg_rating_product) - $i >= 1) --}}
                                    {{--Full Start--}}
                                    {{-- <span class="fa fa-star " style='font-size:1rem;color:#FF9529'></span>
                                @elseif ($shop_rating->avg_rating_product - $i > 0)
                                    {{--Half Start--}}
                                    <span class="fa-solid fa-star-half-stroke" style='font-size:1rem;color:#FF9529'></span>
                                {{-- @else
                                    {{--Empty Start--}}
                                <span class="fa fa-star " style='font-size:1rem;color:#eee'></span>
                                {{-- @endif --}} --}}
                            {{-- @endfor --}} --}}
                            {{-- <span class=" text-secondary fs-6 fw-light">({{$shop_comment_count->comment_count }})</span>  --}}
                            <span>
                    </div>
                </div>
            </li>

            <li class="list-group-item border border-0" style='font-size:0.9rem'>
                <div class='d-flex justify-content-between align-items-center '>
                      <div>
                        <span class='text-capitalize fw-bold'> Seller:</span>
                        <a href='#' class='text-decoration-none'><span class=' text-uppercase fw-bold  ms-1 text-secondary'>{{ __('hitcom') }}</span></a>
                    </div>

                    <div class=''>
                    <span class='text-capitalize fw-bold'>{{ __('seller rating') }}</span>
                             <span class="fs-6 ms-1 badge">
                                {{-- @for ($i = 0; $i < 5; $i++)
                                    @if (floor($seller_rating->avg_rating_seller) - $i >= 1)
                                        {{--Full Start--}}
                                        <span class="fa fa-star " style='font-size:1rem;color:#FF9529'></span>
                                    {{-- @elseif ($seller_rating->avg_rating_seller - $i > 0)
                                        {{--Half Start--}}
                                        <span class="fa-solid fa-star-half-stroke" style='font-size:1rem;color:#FF9529'></span>
                                    {{-- @else
                                        {{--Empty Start--}}
                                    <span class="fa fa-star " style='font-size:1rem;color:#eee'></span>
                                    {{-- @endif --}} --}} --}}
                                {{-- @endfor --}} --}}
                                {{-- <span class=" text-secondary fs-6 fw-light">({{$seller_comment_count->comment_count_seller}})</span>  --}}
                            <span>
                    </div>
                </div>
            </li>
            <li class="list-group-item border border-0">
                <div class='d-grid gap-2  '>
                    <a href='{{ route('add-to-cart', ['user_id' => Auth::id(), 'id'=> $shop->id, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}'
                    class='btn btn-success btn-sm text-capitalize fw-bold'>{{ __('add to cart') }}<span class="ms-1 fas fa-cart-plus text-light"></span></a>
                </div>
            </li>
            </ul>
        </div>

    </div>

     <div class='row row-cols-2 '>

     <div class='col '>

            <div class='row row-cols-6 '>


                    {{-- @foreach ( $shop->images as $image )
                            <div class='col  ' style='cursor:pointer'>
                                    <img class="img-fluid imgThumb" src="{{ app()->environment('production') ? asset(isset($image->product_image) ? 'public/'.$image->product_image : 'public/media/products/support.png') : asset(isset($image->product_image) ? $image->product_image : 'media/products/support.png')}}"  alt="...">
                            </div>
                    @endforeach --}}
                        
            </div>
    </div>
        <div class='col'>

        </div>
    </div>




<div class="accordion my-3" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header bg-light" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
         <span class='fw-bold text-dark btn btn-sm btn-outline-warning badge text-uppercase '> {{ __('rate this product ! ') }} <i class="fa-solid fa-square-poll-vertical"></i></span>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    
      <div class="accordion-body">

      <form method='GET' action='#' class='rating-form'>

        <div class="mb-3">
            
                <select class="form-select" name='rating_product' >
                    <option value="">{{ __('choose your satisfaction level') }} </option>
                    <option value="5">{{ __('like this product') }}</option>
                    <option value="4">{{ __('very satisfied') }}</option>
                    <option value="3">{{ __('satisfied') }}</option>
                    <option value="2">{{ __('not satisfied') }}</option>
                    <option value="1">{{ __('dislike this product') }}</option>
                </select>
        </div>

        <div class="mb-3">
            <label for="comment_product" class="form-label">{{ __('Review:') }}</label>
            <textarea name='comment_product' type="text" rows='2' class="form-control"></textarea>
        </div>

        <div class='d-grid gap-2  '>
             <button type='submit' 
              class='btn btn-outline-warning btn-sm text-capitalize  text-dark fw-bold'>{{ __('submit your response !') }}
              </button>
        </div>

        </form>
      
      
      </div>
    </div>
  </div>
</div>





<div class=' reviews-tri'>
    

</div>

{{-- <div class=' reviews-list'>

        @foreach ($reviews as $review )
            
            <div class="card  h-100 mb-3 p-1" style='border-radiux:0px;border-top: none;border-left: none;border-right: none;border-bottom: 1px solid #ddd ' >

                <div class="row g-0">
                
                    <div class="col-12 d-flex justify-content-start align-items-center">
                
                        <span class="ms-1 text-muted text-capitalize fw-bold" style='font-size:0.9rem'>{{ $review->user->first_name }}  {{ $review->user->last_name }}</span>
                        
                        <span class="ms-2 text-muted" style='font-size:0.8rem'> {{ $review->timeago }}  </span>

                        <span class=" ms-1 badge" style='font-size:0.8rem'>

                             @for ($i = 0; $i < 5; $i++)
                                    @if (floor($review->rating) - $i >= 1)
                                        {{--Full Start--}}
                                        <span class="fa fa-star " style='font-size:0.8rem;color:#FF9529'></span>
                                    {{-- @elseif ($review->rating - $i > 0)
                                        {{--Half Start--}}
                                        <span class="fa-solid fa-star-half-stroke" style='font-size:0.8rem;color:#FF9529'></span>
                                    {{-- @else
                                        {{--Empty Start--}}
                                    <span class="fa fa-star " style='font-size:0.8rem;color:#eee'></span>
                                    {{-- @endif --}}
                                {{-- @endfor --}} --}} --}}
                                
                        {{-- <span>

                    </div>

                    <div class="col-12">
                        <div class="card-body bg-light">
                            <p class="card-text text-secondary ms-2" style='font-size:0.9rem'> 
                            {{ isset($review->commentproduct->comment) ? $review->commentproduct->comment: '' }}  </span>
                        
                            </p>
                        </div>
                    </div>
                
                </div>

            </div>
        @endforeach --}}


       <div class="pagination justify-content-center mt-4">
    {{-- {{ $reviews->links() }} --}}
</div> --}}


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


    </div>


</div>
@endsection


@section('js')

<script>



let imgScreen=document.querySelector('#imgScreen')
let imgThumbs=document.querySelectorAll('.imgThumb')

imgThumbs.forEach(i =>{
    i.addEventListener('click', (e)=>{ 
        console.log(e.target.src)
        imgScreen.src = e.target.src
        
        })
})




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

    swiper.on('click', function (swiper, event) { console.log('slide clicked', event)});





</script>


@endsection