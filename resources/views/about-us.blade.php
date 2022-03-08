@extends('base')

@section('meta')
 <meta name="author" content="ch">


@endsection

@section('title', 'About us')

@section('css')

<style>



</style>
@endsection


@section('content')


<div class='container'>
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' 
            href="{{ route('home', App::getLocale())}}">{{ __('the shop') }}</a></li>
            <li class="breadcrumb-item  active text-capitalize">{{ __('about us') }}</li>
          </ol>
    </nav>



</div>
<div class='container'>
  <p class="fs-6">
    HITCOM is an e-commerce platform which benefits diverse groups of sellers by hosting their products.  successfully captures the spirit of the organization, beginning with a heartwarming text about its mission and photographs of empowered women who represent their community. 
  </p>
  <p class="fs-6">
  The website color scheme is gentle, combining purples and pinks that channel positive female vibes. Parallax scrolling helps to engage visitors even more, allowing the areas of color and photographs to shift throughout the page as they browse. 
  </p>
  <p class="fs-6">
  By confidently placing calls-to-action on the About Us page - a sweet “Donate” button on the right hand side, and a slider at the bottom of the page - visitors are invited to become members of the organization. 
  </p>    

</div>

@include('components.values')
@endsection


@section('js')

<script>

</script>

@endsection