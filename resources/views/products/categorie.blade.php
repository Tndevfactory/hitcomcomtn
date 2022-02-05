@extends('base')

@section('meta')
 <meta name="author" content="ch">
 <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>
@endsection

@section('title', 'category')



@section('content')

<style> 

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

<div class='container bg-info my-3'>
@include('components.breadcrumb')
ggg


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
 
</div>

</div>





@endsection


@section('js')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
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