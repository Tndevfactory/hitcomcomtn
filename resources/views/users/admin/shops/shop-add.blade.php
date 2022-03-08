@extends('admin')

@section('title', 'admin-seller-add')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('add shop') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-end mt-3 px-3'> 
    <a href="{{ route('admin-shops-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-left"></i>  {{ __('manage retailers') }} </a> 
</div>


<form class="row g-3 p-0 p-md-2 bg-light " action="{{route('auth-login', App::getLocale())}}"
         method="POST" >

         @csrf


  <div class=' row  my-2 mt-4'> 

    <div class=' col '> 
       <div class="mb-3">
        <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Nom du magasin 🇨🇵</label>
        <input  value="{{ old('fr_product_name') ?? '' }}" name='fr_product_name'  type="text" class="form-control form-control-sm" 
         title='nom du produit 🇨🇵 '>
       </div>
      <div class="mb-3">
         <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Description vendeur en francais 🇨🇵</label>
        <textarea  value="{{ old('fr_shop_description') ?? '' }}" name='fr_shop_description' class="form-control" rows="3"  title='description en francais 🇨🇵'></textarea>
      </div>
    </div> 

    <div class=' col'> 
        <div class="mb-3">
        <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Shop name 🇬🇧</label>
        <input  value="{{ old('en_product_name') ?? '' }}" name='en_product_name'  type="text" class="form-control  form-control-sm" id="exampleFormControlInput1" title='product name  🇬🇧'>
       </div>
      <div class="mb-3">
         <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Shop Description in english 🇬🇧</label>
        <textarea  value="{{ old('en_shop_description') ?? '' }}" name='en_shop_description' class="form-control"  rows="3"  title='description in english 🇬🇧'></textarea>
      </div>
    </div> 

    <div class=' col'> 
        <div class="mb-3">
        <label for="formFileSm" class="form-label d-block" dir='rtl'  style='font-size:0.8rem'>🇦🇪 اسم المحل </label>
        <input type="text" class="form-control  form-control-sm" dir='rtl' id="exampleFormControlInput1"   title='🇦🇪 اسم المنتج '>
       </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label d-block" dir='rtl'  style='font-size:0.8rem'>🇦🇪 وصف البائع</label>
          <textarea value="{{ old('ar_description') ?? '' }}" name='ar_description' class="form-control" dir='rtl' rows="3" title='🇦🇪 وصف المنتج'></textarea>
        </div>
    </div> 
    
  </div>

  <div class=' row mt-3'> 

    <div class=' col address city phone1'> 
       <div class="mb-3">
          <label for="unit_price" class="form-label " style='font-size:0.8rem'>Address</label>
          <input value="{{ old('unit_price') ?? '' }}" name='unit_price' type="text" class="form-control  form-control-sm" placeholder="unit price" title='unit price'>  
       </div>

       <div class="mb-3 d-flex justify-content-between">
          <div class="">
           <label for="euro_coef" class="form-label " style='font-size:0.8rem'>shop_phone1</label>
            <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
          </div>
          <div class="">
            <label for="discount" class="form-label " style='font-size:0.8rem'>shop_phone2</label>
             <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
          </div>
        </div>
    </div>
    
      <div class=' col category subcategory'> 
        <div class="mb-3">
         <label for="selling_price" class="form-label " style='font-size:0.8rem'>City</label>
           <input  value="{{ old('selling_price') ?? '' }}" name='selling_price' type="text" class="form-control  form-control-sm"  title="selling price" >
         </div>

         <div class="">
            <label for="discount" class="form-label " style='font-size:0.8rem'>shop_email</label>
             <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
          </div>

      </div> 

      <div class=' col seller fee'>

          <div class="mb-3 d-flex justify-content-between">

          <div class="">
           <label for="euro_coef" class="form-label " style='font-size:0.8rem'>shop_category</label>
            <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
          </div>

          <div class="">
            <label for="discount" class="form-label " style='font-size:0.8rem'>shop_creation_date</label>
             <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
          </div>

        </div>
      </div> 

       
  </div>

  <div class='row'> 

    <div class=' col '> 
       <div class="mb-3">
          <label for="formFileSm" class="form-label" style='font-size:0.8rem'>Image</label>
          <input class="form-control form-control-sm" id="formFileSm" type="file">
        </div>
      
    </div> 
    <div class=' col'> 
        
           <div class="">
            <label for="discount" class="form-label " style='font-size:0.8rem'>seller_fiscal_id</label>
             <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
          </div>
      </div> 


     <div class=' col '> 
       <div class="d-grid gap-2 mb-2">
        <button class="btn btn-success fw-bold btn-sm" type="submit">Save</button>
        <button class="btn btn-secondary btn-sm" type="reset">Cancel</button>
      </div>
    </div> 
    
  </div>

</form>
@endsection


@section('js')
<script>

</script>
@endsection