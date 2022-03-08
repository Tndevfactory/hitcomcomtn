@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'login')


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
    <div class='col col-md-6 offset-md-3 '>
        
      
        <form action="{{route('auth-register', App::getLocale())}}"
         method="POST" class="row g-3 p-0 p-md-2 bg-light rounded shadow ">

              @csrf
            <span class="fs-5 text-center d-block"> <i class="fas fa-lock fs-4 d-inline-block text-dark "></i> {{ __('Sign up') }} </span>

        <div class=" row  g-3">
              
                <div class="col-12 col-md-6">
                <label for="first_name" class="form-label text-capitalize">{{ __('first name') }}</label>
                        <input type="text" value="{{ old('first_name') ?? '' }}" class="form-control
                                @error('first_name') 'is-invalid' @enderror "  name="first_name">
                                @error('first_name') <span class="form-text text-danger small">{{$message}}.</span>  @enderror
                </div>

                <div class="col-12 col-md-6">
                        <label for="last_name" class="form-label text-capitalize">{{ __('last name') }}</label>
                        <input type="text" value="{{ old('first_name') ?? '' }}" class="form-control
                                @error('last_name') 'is-invalid' @enderror "  name="last_name">
                                @error('last_name') <span class="form-text text-danger small">{{$message}}.</span> @enderror
                </div>
       

       
        <div class="col-md-12">
           <label for="email" class="form-label text-capitalize">{{ __('email') }}</label>
            <input type="email"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" value="{{ old('email') ?? '' }}" class="form-control
                @error('email') 'is-invalid' @enderror "  name="email">
                @error('email') <span class="form-text text-danger small">{{$message}}.</span>  @enderror
        </div>

        <div class="col-md-12">
           <label for="password" class="form-label text-capitalize">{{ __('password') }}</label>
            <input type="password" value="{{ old('password') ?? '' }}" class="form-control
                @error('password') 'is-invalid' @enderror "  name="password">
                @error('password') <span class="form-text text-danger small">{{$message}}.</span>  @enderror
        </div>

        <div class="col-md-12">
           <label for="password_confirmation" class="form-label text-capitalize">{{ __('password confirmation') }}</label>
            <input type="password" value="{{ old('password_confirmation') ?? '' }}" class="form-control
                @error('password_confirmation') 'is-invalid' @enderror "  name="password_confirmation">
                @error('password_confirmation')<span class="form-text text-danger small">{{$message}}.</span> @enderror
        </div>
        
        <div class="col-md-12">
           <label for="address" class="form-label text-capitalize">{{ __('address') }}</label>
            <input type="text" value="{{ old('address') ?? '' }}" class="form-control
                @error('address') 'is-invalid' @enderror "  name="address">
                @error('address')<span class="form-text text-danger small">{{$message}}.</span>  @enderror
        </div>
        
        <div class="col-md-12">
           <label for="phone1" class="form-label text-capitalize">{{ __('phone') }}</label>
            <input type="text" value="{{ old('phone1') ?? '' }}" class="form-control
                @error('phone1') 'is-invalid' @enderror "  name="phone1">
                @error('phone1') <span class="form-text text-danger small">{{$message}}.</span> @enderror
        </div>
        
       
        <div class="col-12 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary btn-sm text-capitalize">{{ __('sign up') }} </button>
            <a href='{{ route('login', App::getLocale())}}' 
            class='text-decoration-none text-primary fs-6'> {{ __('Have an account, please sign in') }} </a>
        </div>
    </div>

     <span class='text-muted text-center' style='border-bottom: 1px solid #ddd;font-size:0.8rem'>{{ __('Or sign in with') }}</span>
       <div class='d-flex flex-column align-items-center justify-content-center pb-2  '>@include('components.facebook-login')</div>

        </form>

        

    </div>

</div>


</div>
@endsection


@section('js')
<script>

</script>
@endsection