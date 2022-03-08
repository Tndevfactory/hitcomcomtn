@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'verify')


@section('css')
<style>
.t{
    color:red;
}
</style>
@endsection


@section('content')

<div class='container  my-5 '>

<div class='row'>
    <div class='col col-md-12  '>
        
        <form class="row g-3 p-0 p-md-2 bg-light rounded shadow-sm" 
        action="{{ route('verification-resend', App::getLocale())}}"
         method="POST" >

         @csrf
         
            <span class="fs-5 text-center d-block"> 
                <i class="fas fa-lock fs-4 d-inline-block text-success "></i>
            {{ __('Account Activation') }}</span>
      
      
            <div class="col-md-12 d-md-flex  align-items-center ">
        
                <span class='flex-grow-1 fs-6'>
                {{ __('
                To get the most of Hitcom Ecommerce platform ,
                 it is important to activate your account ..., please check email spam folder as well') }}
                </span>

                <button type="submit" class="btn btn-primary mt-3 mt-md-0"> {{ __('Click here to get the activation link') }}</button>
            </div>

          
        </form>
    </div>

</div>


</div>
@endsection


@section('js')
<script>

</script>
@endsection