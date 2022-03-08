@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'recherche')


@section('css')
<style>

</style>
@endsection


@section('content')

<div class='container  my-3'>

<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            
            <li class="breadcrumb-item active  text-capitalize" aria-current="page">            
                  {{ __('result') }} :  {{ $products->total() > 0 ?   $products->total(): '0' }} <span class='ms-1'>{{ __('found') }} </span>
            </li>
          </ol>
    </nav>

@forelse ($products as $product)
    
<div class="card mb-3 h-100 my-3 shadow-sm" >
  <div class="row g-0">

    <div class="col-md-2">
      <img src="{{ app()->environment('production') ? asset(isset($product->images[0]->product_image) ? 'public/'.$product->images[0]->product_image : 'public/media/products/support.png') :
         asset(isset($product->images[0]->product_image) ? $product->images[0]->product_image : 'media/products/support.png')}}"
      class="img-fluid rounded-start" alt="...">
    </div>

    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title fs-5 "> 
                  @if(App::getLocale() === 'fr')
                    {{ $product->fr_product_name }}  

                      @elseif(App::getLocale() === 'en')
                        {{ $product->en_product_name }}  
                      @else
                        {{ $product->ar_product_name }}   
                        
                      @endif 
                      <span class=' text-uppercase ms-3'>
                                <span class=' {{ $product->status === 'available' ? 'text-success' : 'text-danger'}}  ms-1' 
                                style='font-size:0.8rem;font-weight:400'> {{ $product->status === 'available' ? 'en stock' : 'non disponible'}} </span>

                        </span>
          </h5>
                      
                       <span class='fw-bold text-dark fs-6'>  {{ __('Price') }}:</span>
                         <span class='fw-bold text-success fs-5'> 
                                
                                @if (Session::get('currency') == 'dollar')  
                                ${{ number_format($product->price,2,'.',',') }}
                                  @else  {{ number_format($product->euro_price,2,',',' ') }}€ 
                                @endif
                            </span>

                         @if($product->discount !== '0.00')
                       
                         <span class='text-capitalize d-inline fw-bold ms-4'> {{ __('discount') }}: 
                          <span class='text-success' dir='ltr'>
                          -{{ number_format($product->discount,0,'.',',')  }}% 
                          </span>
                         </span>
                         @else
                             {{ '' }}
                         @endif

        
        <p class="card-text fs-6 text-secondary">  
                     @if(App::getLocale() === 'fr')
                         {{ $product->fr_description }}  

                        @elseif(App::getLocale() === 'en')
                          {{ $product->en_description }}  
                        @else
                          {{ $product->ar_description  }}   
                         
                        @endif .
        </p>
        
      <a href='{{ route('show-product' , ['slug'=> $product->product_slug , 'language' => App::getLocale()])}}' class='stretched-link'> </a>
      </div>
    </div>
   
  </div>
</div>

@empty
<div class="card mb-3 h-100 my-3 border border-0" >
  <p class="card-text fs-4 text-muted text-capitalize"> {{ __('no result found') }}.</p>
</div>

@endforelse


                      

</div>


<div class="pagination justify-content-center mt-4">

                           {{-- {{ $products->count ()}}   --}}
                           {{ $products->links() }} 
 </div>
@include('components.values')
@include('components.values')
@endsection


@section('js')
<script>

</script>
@endsection