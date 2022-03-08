@extends('base')

@section('meta')
 <meta name="author" content="ch">
 
@endsection

@section('title', 'cart-detail')


@section('css')
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
@endsection


@section('content')

<div class='container my-3'>

 <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize">{{ __('cart') }}</li>
          </ol>
    </nav>

    
        @php 
        
        if(session()->get('cart')){
            
            $cart = session()->get('cart');

           ;
        }else{
            
            $cart=[];
        };

       

        if(session()->get('compta')){
             
            
            $compta=session()->get('compta');

          
        }else{
           
            $compta=[
                'total_qty' => 0,
                'totat_price_ht' => 0,
                'totat_discount' => 0,
                'total_taxes'  => 0,
                'total_before_coupon' => 0,
                'coupon_value' => 0,
                'shipment_fee' => 0,
                'total_ttc'=> 0,
                'currency'=> '',
                ];
        };
        
        @endphp
    

    <div class='row row-cols-1 row-cols-md-2 cart-details'>


        <div class='col-12 col-md-8 '>
                <table class="table">

                    <thead class='table-light'>
                        <tr>
                        <th scope="col" class='text-capitalize'>image</th>
                        <th scope="col"  class='text-capitalize'>product</th>
                        <th scope="col"  class='text-capitalize' >quantity</th>
                        <th scope="col"  class='text-capitalize'>price</th>
                        <th scope="col" class='text-capitalize'>
                        <a href='{{ route('clear-all-cart-items', ['currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}'>
                          <i title='delete total order'  class="fa-solid fa-trash-can text-primary" style='font-size:1.1rem'></i>
                        </a>
                        </th>
                        
                        </tr>
                        
                    </thead>
                    <tbody>

                    <form method='GET' action='{{ route('update-cart-quantity-item', [ 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}'>
                        
                        <input type='hidden' name='currency' value='{{ Request()->session()->get('currency')  }}' />
                        <input type='hidden' name='language' value='{{ App::getLocale() }}' />
                        
                        @forelse ($cart as $k => $v)

                            <tr>

                                <td>
                                <img src={{app()->environment('production') ? asset('public/'.$v['product_img']) : asset($v['product_img']) }} title="basket product" 
                                class='mb-1 d-inline-block' alt='basket product' style='height:2.5rem;border-radius:0%'>
                                </td>
                                <td class='text-capitalize'>{{ $v['product_name']}}</td>
                                <td>
                                <select name={{'cart'.$v['id']}} class='form-select form-select-sm' onchange="this.form.submit()" style='width:3.9rem'>
                                    @for ($i=1; $i <= $v['product_stock_quantity'] ; $i++)
                                    
                                        <option class=''  {{$v['qty'] == $i ? 'selected' : '' }} value="{{ $i }}" >{{ $i }}</option>
                                    @endfor
                                </select>
                                
                                </td>
                                <td>{{ $v['currency'] === 'euro' ? number_format($v['price'], 2,',',' ').'€': '$'.number_format($v['price'],2,'.',',') }}</td>
                                <td><a href='{{ route('delete-cart-item', ['product_id' => $v['id'] , 'currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}'><i title='delete order item' class="fa-solid fa-trash-can text-danger"></i></a></td>
                            
                                </tr>
                        @empty
                            <tr>
                                <td colspan ='5' class='text-capitalize text-center' style='background-color:#FFB6C1'> 
                                {{ __('your Shoping cart is empty') }} 
                                <a class="text-decoration-none btn btn-outline-primary btn-sm ms-3"  href="{{ route('home', App::getLocale())}}">
                                        {{ __('back to shop') }}
                                </a>
                                </td>
                            </tr>
                        @endforelse
                    </form>
                    </tbody>
                </table>
        </div>

        <div class='col-12 col-md-4'>
          <form method='get' action='{{ route('view-order-invoice', ['currency'=> Request()->session()->get('currency'), 'language' => App::getLocale()]) }}'>

              <ul class="list-group">
                  <li class="list-group-item bg-light  fw-bold ">{{ __('Shoping cart') }}</li>

                  
                  <li class="list-group-item d-flex justify-content-between align-items-center"  style='font-size:0.9rem;'>
                      {{ __('# articles ') }}
                      <span class="text-dark fw-bold " style='font-size:0.9rem;'>{{ $compta['total_qty'] }}</span>
                  </li>
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center "  style='font-size:0.9rem;'>
                        {{ __('Total excluding VAT ') }}
                        <span class="text-dark fw-bold" style='font-size:0.9rem;'>{{ $compta['totat_price_ht'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center " style='font-size:0.9rem;'>
                      {{ __('Shipment fees') }}
                        <span class="text-dark fw-bold" style='font-size:0.9rem;'>{{ $compta['shipment_fee'] }}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center "  style='font-size:0.9rem;'>
                      {{ __('Coupon code') }}
                        <input name='coupon_code' class="text-dark fw-bold" style='font-size:0.9rem;' />
                  </li>
                  
                  <li class="list-group-item d-grid">
                    <button type='submit'  
                    class='btn btn-success text-capitalize text-decoration-none'  style='font-size:1rem;'>{{ __('checkout') }}
                    </button>
                  </li>

              </ul>
          
        </div>

    </div>{{-- end row shoppingcart --}}

    @auth
<span class="text-start d-block fw-bold mb-3">ℹ️ {{ __('If you wish to receive the order in another address, please indicate/choose the shipping address') }} </span>
    <div class='row'>
          <div class='col col-md-6 '>
              
              @if(Auth::user()->shipment_address)
                <div class="col-md-12 mb-3">
                  
                  <input type="checkbox"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" 
                  value="saved_shipping_address" class="form-check-input" name="shipping_address">

                  <label for="shipping_address" class="form-check-label ">{{ __('I wish to receive order to my saved shipping address') }}</label>
               </div>

              @else
              
               <div class="col-md-12 mb-3">
                  <label for="shipping_address" class="form-label ">{{ __('Shipping address') }}</label>
                  <input type="text"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" 
                  value="{{ old('shipping_address') ?? '' }}" class="form-control form-control-sm" name="shipping_address">
               </div>

               @endif

          </div>
    </div>
@endauth
</form>{{-- checkout form --}}

    @guest
        <div class='row'>
          <div class='col col-md-6 '>

              <form class="row g-3 p-0 p-md-2"   action="{{route('auth-login', ['language'=> App::getLocale()])}}"  method="POST" >

                  @csrf

                  <span class="fs-6 text-start d-block fw-bold">ℹ️ {{ __('To finalize the order, please log in') }} </span>

               <input type="hidden"  value="{{ url()->current() }}" name="from_shoping_cart_url">
              
               <div class="col-md-12">
                  <label for="inputEmail4" class="form-label text-capitalize">{{ __('email') }}</label>
                  <input type="email"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" value="{{ old('email') ?? '' }}" class="form-control " name="email">
               </div>

              <div class="col-md-12">
                  <div class="d-flex justify-content-between align-items-center">
                      <label for="inputPassword4" class="form-label text-capitalize">{{ __('password') }}</label>
                      <a href="{{ route('password.email.form', App::getLocale()) }}"  class="text-decoration-none text-primary"> {{ __('forget password') }}
                      </a>
                  </div>
                  <input type="password" value="{{ old('password') ?? '' }}" class="form-control"  name="password"> 
              </div>

              <div class="col-12 d-flex justify-content-between align-items-center">
                  <button type="submit" class="btn btn-primary btn-sm text-capitalize">{{ _('Sign in') }}</button>
                  <a href='{{ route('register-form', App::getLocale())}}'
                  class='text-decoration-none text-primary  fs-6 '> {{ __('no account, please sign up') }}</a>
              </div>

            </form>

          </div>
      </div>
    @endguest


</div>{{-- end container --}}


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

    swiper.on('click', function (swiper, event) { console.log('slide clicked', event)});


</script>
@endsection