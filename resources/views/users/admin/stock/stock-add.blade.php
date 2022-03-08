@extends('admin')

@section('title', 'admin-stock-add')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('add stock') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-end mt-3 px-3'> 
    <a href="{{ route('admin-stock-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-left"></i>  {{ __('manage stock') }} </a> 
</div>


<form class="row g-3 p-0 p-md-2 bg-light " action="{{route('auth-login', App::getLocale())}}"
         method="POST" >

         @csrf

  <div class=' row mt-3'> 

    <div class=' col-6 offset-3 stock name'> 
         <div class="mb-3">
            <label for="euro_coef" class="form-label " style='font-size:0.8rem'>Stock category</label>
              <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
            </div>
         
           <div class="mb-3 d-flex justify-content-between">

            <div class="">
            <label for="euro_coef" class="form-label " style='font-size:0.8rem'>Stock name</label>
              <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
            </div>

            <div class="">
              <label for="discount" class="form-label " style='font-size:0.8rem'>Constructor</label>
              <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
            </div>

            <div class="">
            <label for="euro_coef" class="form-label " style='font-size:0.8rem'>weight</label>
              <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
            </div>

         </div>

    </div>
    
      <div class=' col-6 offset-3 category subcategory'> 
     
          <div class="mb-3 d-flex justify-content-between">


              <div class="">
                <label for="discount" class="form-label " style='font-size:0.8rem'>color</label>
                <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
              </div>

              <div class="">
              <label for="euro_coef" class="form-label " style='font-size:0.8rem'>Dimension</label>
                <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
              </div>

              <div class="">
                <label for="discount" class="form-label " style='font-size:0.8rem'>Pattern</label>
                <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
              </div>

           </div>
      </div> 

       <div class=' col-6 offset-3 category subcategory'> 
              <div class="d-grid gap-2 mt-3 pt-1">
              <button class="btn btn-success fw-bold btn-sm" type="submit">Save</button>
              <button class="btn btn-secondary btn-sm" type="reset">Cancel</button>
            </div>
       </div> 
       <div class=' col-6 offset-3 category subcategory'> 
              <div class="card text-dark bg-light mb-3 mt-3">
              <div class="card-body">
                <h5 class="card-title fs-6">Information <i class="fa-solid fa-circle-info"></i></h5>
                <p class="card-text fs-6">Only for similar products with exact match ex: 50 samsung tv with the same color and dimension</p>
              </div>
            </div>
       </div> 

       
  </div>


</form>
@endsection


@section('js')
<script>

</script>
@endsection