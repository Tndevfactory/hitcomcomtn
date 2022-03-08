@extends('base')

@section('meta')
 <meta name="author" content="ch">


@endsection

@section('title', 'Accueil')
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


</style>
@endsection




@section('content')


<div class='container'>

   @if (App::getLocale() == 'ar')
    
    <style>
    .carousel-item {
        margin-right: initial;
    }
    .carousel-control-next {
        right: initial;
    }
    </style>

   @endif



<div id="carouselExampleCaptions" class="carousel slide mt-4 d-none d-md-block" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  @php
  $crs=[1,2,3];
  @endphp

  @foreach ($crs as $cr )

  <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
      <div class="cover-shadow" 
      style='background-color:rgba(0,0,0,0.5);position:absolute;top:0;left:0;width:100%; min-height:100%'></div>
      <img src="{{ app()->environment('production') ? asset('public/media/products/carousel1.png') : asset('media/products/carousel1.png')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class='fs-2 mb-3'style='text-shadow: 1px 1px 1px rgba(0,0,0,0.5)'>Best products</h5>
        <a href=#' class='btn btn-warning mb-3 fs-6'>More details</a>
        <p class='fs-3' style='text-shadow: 1px 1px 1px rgba(0,0,0,0.5)'>Traditional art to discover about tunisia</p>
      </div>
    </div>
      
  @endforeach
    
 

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

<h2 class='text-center mt-5 mb-3 categories-title text-uppercase'> {{ __('Categories') }} </h2>




<div class='container'>



<div class="row row-cols-2 row-cols-md-4 g-4">

    @foreach ($categories as $category)
        <div class="col">
           <div class="card card-categorie text-white border border-0 h-100">
                <img src="{{ app()->environment('production') ? asset('public/'.$category->category_image) : asset($category->category_image)}}" class="card-img" alt="...">
                <div class="card-img-overlay ">
                    
                    <div style='background-color:rgba(0,0,0,0.5)' class="w-100">
                    <p class="card-title fs-6 text-center py-1 rounded-sm  text-uppercase"
                     style='font-weight:900;text-shadow: 1px 1px 3px rgba(0,0,0,0.4)' style='letter-spacing:2px'> 
                        @if(App::getLocale() === 'fr')
                        {{ $category->fr_category_name }}

                        @elseif(App::getLocale() === 'en')
                          {{ $category->en_category_name }}
                        @else
                          {{ $category->ar_category_name }}
                        @endif 
                     </p>
                     </div>
                    <a href="{{ route('show-category' , ['slug'=> $category->category_slug , 'currency'=> Request()->session()->get('currency'),  'language' => App::getLocale()])}}" 
                    class="stretched-link btn-sm">                
                    </a>

                </div>
            </div>
        </div>
    @endforeach
    
</div>

</div>

<h2 class='text-center mt-5 mb-3 products-title text-uppercase'>  {{ __('Products') }} </h2>

{{-- <pre>
@php 

if(session()->get('cart')){
    print_r(session()->get('cart'));
     var_dump(session()->get('cart'));
    echo 'compta ================== ';
    print_r(session()->get('compta'));
    var_dump(session()->get('compta'));
  }else{
    echo 'session cart empty';
  };

@endphp
</pre> --}}

<div class='container'>
 

<div class="row row-cols-2 row-cols-md-4 g-4">


    @foreach ($products as $product)
    <div class="col">
        <div class="card card-product h-100 shadow-sm ">

       {{-- @php
       echo( isset($product->images[0]->product_image));
        @endphp --}}

        <img src="{{ app()->environment('production') ? asset(isset($product->images[0]->product_image) ? 'public/'.$product->images[0]->product_image : 'public/media/products/support.png') :
         asset(isset($product->images[0]->product_image) ? $product->images[0]->product_image : 'media/products/support.png')}}"
         class="card-img-top" alt="...">

        <div class='control-btn'>

              <div class="btn-group" role="group" aria-label="Basic example">

                <a href='{{ route('show-product' , ['slug'=> $product->product_slug , 'language' => App::getLocale()])}}' 
                class='btn btn-light' title='see details'> <span class="fas fa-eye text-info"></span> </a>

                <a href='{{ route('add-to-cart', ['user_id' => Auth::id(), 'id'=> $product->id, 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}' 
                   class='btn btn-success text-capitalize' title='add to cart'> {{ __('add to cart') }}<span class="ms-1 fas fa-cart-plus text-light"></span>
                </a>

                <a href='{{ route('add-to-wishlist', ['product_id' => $product->id , 'user_id'=> Auth::id(), 'language'=> App::getLocale()]) }}'
                 class='btn btn-light' title='add to wishlist'> <span class="fas fa-heart text-danger "></span></a>

             </div>

        </div>
        <div class="card-body">
            <h5 class="card-title text-uppercase " style='color:#666;font-size:1rem'>
            <div class='text-muted mb-1' style='font-size:0.8rem;font-weight:300'>[ {{ $product->id }} ] </div>  
                     @if(App::getLocale() === 'fr')
                     {{ $product->fr_product_name }}    <span class=' {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ms-4' style='font-size:0.8rem;font-weight:400'> {{ $product->status === 'available' ? 'en stock' : 'non disponible'}} </span>  

                        @elseif(App::getLocale() === 'en')
                          {{ $product->en_product_name }}    <span class=' {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ms-4' style='font-size:0.8rem;font-weight:400'> {{ $product->status === 'available' ? 'available' : ' not available' }} </span>  
                        @else
                          {{ $product->ar_product_name }}    <span class=' {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ms-4' 
                           style='font-size:0.8rem;font-weight:400'> {{ $product->status !== 'available' ? 'غير متوفر' : 'متوفر' }} </span>  
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
            <div class='price'>

            <span class="card-text">

                
                   <span class='fw-bold text-secondary '> {{ __('Price') }}:  </span> 
                   <span class='fw-bold text-success fs-5'>  
                      @if (Session::get('currency') == 'dollar')  
                      ${{ number_format($product->price,2,'.',',') }}
                        @else  {{ number_format($product->euro_price,2,',',' ') }}€ 
                      @endif
                   </span> 
               
            
            </span>

           @if($product->discount != '0')
           
                    @if(App::getLocale() === 'fr')
                    
                      <span class="card-text badge  text-white d-flex justify-content-center align-items-center" 
                          style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.8rem;background-color: #FE472C; height:2.2rem;width:2.2rem;border-radius:50%' >
                        -{{ number_format($product->discount,0,'.',',') }}%
                      </span>

                    @elseif(App::getLocale() === 'en')
                      <span class="card-text badge  text-white  d-flex justify-content-center align-items-center" 
                          style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.8rem;background-color: #FE472C; height:2.2rem;width:2.2rem;border-radius:50%' >
                        -{{ number_format($product->discount,0,'.',',') }}%
                      </span>
                    @else
                      <span class="card-text badge text-white d-flex justify-content-center align-items-center " 
                          style='text-shadow:1px 1px 1px rgba(0,0,0,0.2);font-size:0.8rem;background-color: #FE472C; height:2.2rem;width:2.2rem;border-radius:50%' dir='ltr'>
                       -{{ number_format($product->discount,0,'.',',') }}%
                      </span>
                    @endif 
              
            
            @endif 

            </div>
            
        </div>
        </div>
    </div> 
    @endforeach
  
</div>

</div>

<div class="pagination justify-content-center mt-4">
    {{ $products->links() }}
</div>

@endsection



@section('js')

<script>
let categorieTitle=document.querySelector('.categories-title ')
// gsap.to(categorieTitle,{x:3, repeat:-1, 
</script>
@endsection