@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'reset-pwd-form')


@section('css')
<style>
.t{
    color:red;
}
</style>
@endsection


@section('content')

<div class='container  my-5 '>
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize">{{ __('change password') }}</li>
          </ol>
    </nav>
    <div class='row'>
        <div class='col col-md-6 offset-md-3 '>
                <form action="{{ route('password.update', App::getLocale()) }}" method="POST"
                 class="bg-light shadow-sm p-3">
            @csrf

            <input type="hidden" name="token" value="{{$token}}">
            <input type="hidden" name="email" value="{{$email}}">

             <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label for="password" class="form-label fs-6 text-muted">{{__('password')}}</label>
                    </div>

                    <input type="password" class="form-control @error('email') 'is-invalid' @enderror"
                            name="password">
                    @error('password')
                    <span class="form-text text-danger small">{{$message}}</span>
                    @enderror
              </div>

              <div class="mb-3">
                    <label for="password_confirmation" 
                    class="form-label fs-6 text-muted">{{ __('password confirmation') }}</label>
                    <input type="password"  class="form-control @error('password_confirmation') 'is-invalid' @enderror"
                    name="password_confirmation" >
                    @error('password')
                        <span class="form-text text-danger">{{$message}}</span>
                    @enderror
               </div>

                <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
        </form>

   
       
        </div>

    </div>
</div>
@endsection


@section('js')
<script>

</script>
@endsection