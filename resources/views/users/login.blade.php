@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'login')




@section('content')

<div class='container  my-5 '>

<div class='row'>
    <div class='col col-md-6 offset-md-3 '>
        
        <form class="row g-3 p-0 p-md-2 bg-light rounded shadow" 
        action="{{route('auth-login', ['language'=> App::getLocale()])}}"
         method="POST" >

         @csrf
         
            <span class="fs-5 text-center d-block"> 
                <i class="fas fa-lock fs-4 d-inline-block text-dark "></i>
            {{ __('Sign in') }} </span>
      
       <div class="col-md-12">
            <label for="inputEmail4" class="form-label text-capitalize">{{ __('email') }}</label>
             <input type="email"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" value="{{ old('email') ?? '' }}" class="form-control  @error('email') 'is-invalid' @enderror "  name="email">
        </div>

        <div class="col-md-12">
       
            <div class="d-flex justify-content-between align-items-center">
                <label for="inputPassword4" class="form-label text-capitalize">{{ __('password') }}</label>
                <a href="{{ route('password.email.form', App::getLocale()) }}"  class="text-decoration-none text-primary fs-6 text-capitalize"> {{ __('forget password') }}
                </a>
            </div>

             <input type="password" value="{{ old('password') ?? '' }}" class="form-control
                @error('password') 'is-invalid' @enderror "  name="password"> 
        </div>

        <div class="col-12 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary btn-sm text-capitalize">{{ _('Sign in') }}</button>
            <a href='{{ route('register-form', App::getLocale())}}'
             class='text-decoration-none text-primary  fs-6 text-capitalize'> {{ __('no account, please sign up') }}</a>
        </div>
       
       <span class='text-muted text-center' style='border-bottom: 1px solid #ddd;font-size:0.8rem'>{{ __('Or sign in with') }}</span>
       <div class='d-flex flex-column align-items-center justify-content-center pb-2  '>@include('components.facebook-login')</div>

        </form>

    </div>

</div>


</div>

@include('components.values')

@endsection


@section('js')
<script>


</script>
@endsection

