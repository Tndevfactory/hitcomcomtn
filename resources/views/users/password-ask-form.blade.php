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
 <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize">{{ __('change password') }}</li>
          </ol>
    </nav>
    <div class='row'>
        <div class='col col-md-6 offset-md-3 '>
            
            <form action="{{ route('password.reset.link',  App::getLocale() ) }}" 
            method="POST" class=" p-2">
            @csrf
             <div class="mb-3">
                <label for="email" class="form-label fs-6 ">{{ __('Please enter your email') }}</label>
                <input type="hidden" name="language" value="{{ App::getLocale() }}">
                <input type="email" value="{{ old('email') ?? '' }}"
                        class="form-control  @error('email') 'is-invalid' @enderror "
                        name="email">
                @error('email')
                <span class="form-text text-danger small">{{$message}}</span>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary btn-sm fs-6">{{ __('click to receive an email link ') }}</button>
        </form>
    

        </div>

    </div>


</div>
@endsection


@section('js')
<script>

</script>
@endsection