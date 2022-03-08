@extends('base')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base-url" content="{{ config('app.url') }}">
 <meta name="author" content="ch">

@endsection

@section('title', 'order-invoice')

@section('css')
<style>

</style>
@endsection


@section('content')


<div class='container my-3'>

    <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize">{{ __('invoice') }}</li>
          </ol>
    </nav>
 
        
        <div class='row row-cols-1 row-cols-md-2'>
            <div class='col-12 col-md-9'>
                invoice
             </div>
            <div class='col-12 col-md-3 '>
              stripe
            </div>
        </div>
</div>





<div class='container carousel my-3'>
    <h5> related products </h5>
    <div class="swiper">
      
      <div class="swiper-wrapper">
      
        <div class="swiper-slide">
            <a href='#'> 
              <img src="https://picsum.photos/500/300" class="img-fluid" alt="...">
              </a>
        </div>
        <div class="swiper-slide">
        <a href='#'> 
              <img src="https://picsum.photos/500/301" class="img-fluid" alt="...">
                </a>
        </div>
        <div class="swiper-slide">
        <a href='#'> 
              <img src="https://picsum.photos/500/299" class="img-fluid" alt="...">
                </a>
        </div>
        <div class="swiper-slide">
        <a href='#'> 
              <img src="https://picsum.photos/500/302" class="img-fluid" alt="...">
                </a>
        </div>
        <div class="swiper-slide">
        <a href='#'> 
              <img src="https://picsum.photos/500/298" class="img-fluid" alt="...">
                </a>
        </div>
        
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




</script>
@endsection