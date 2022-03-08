@extends('admin')

@section('title', 'admin profile')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('Admin profile ') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-end mt-3 px-3'> 
    <a href="{{ route('admin-notifications-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-left"></i>  {{ __('Change password') }} </a> 
</div>


<form class="row g-3 p-0 p-md-2 bg-light " action="{{route('admin-notification-send', [ 'language' => Request()->language, 'id' => Auth()->user()->id ])}}"
         method="POST" >

         @csrf

  <div class=' row mt-3'> 
    <div class="col-6 offset-3">

       <div class="mb-3">
          <label for="email" class="form-label " style='font-size:0.8rem'>Email</label>
          <input value="{{ old('email') ?? '' }}" name='email' type="text" class="form-control  
          form-control-sm"  title='email'>  
       </div>

       <div class="mb-3">
          <label for="subject" class="form-label " style='font-size:0.8rem'>subject</label>
          <input value="{{ old('subject') ?? '' }}" name='subject' 
          type="text" class="form-control  form-control-sm" title='subject'>  
       </div>

       <div class="mb-3">
          <label for="message" class="form-label " style='font-size:0.8rem'>message</label>
          <textarea row='10' value="{{ old('message') ?? '' }}"
           name='message' type="text" class="form-control  form-control-sm" title='message'> </textarea> 
       </div>

       <div class="d-grid gap-2 mt-3 pt-1">
         <button class="btn btn-success fw-bold btn-sm" type="submit">Save</button>
      </div>
    </div>
 </div> 

</form>
@endsection


@section('js')
<script>

</script>
@endsection