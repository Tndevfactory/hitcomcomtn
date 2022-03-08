@extends('admin')

@section('title', 'admin-add-product')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('add product') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-end mt-3 px-3'> 
    <a href="{{ route('admin-products-list', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-left"></i>  {{ __('manage product') }} </a> 
</div>


<form class="row g-3 p-0 p-md-2 bg-light " action="{{route('auth-login', App::getLocale())}}"
         method="POST" >

         @csrf

  <div class=' row mt-3'> 

    <div class=' col stock tax'> 
      <label for="stock_name" class="form-label " style='font-size:0.8rem'>Stock name</label>
       <select class="form-select form-select-sm mb-2 " aria-label=".form-select-sm example" title='stock name ' name='stock_name'> 
          <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>

       <label for="tax" class="form-label " style='font-size:0.8rem'>Tax</label> 
        <select class="form-select form-select-sm  mb-2 " aria-label=".form-select-sm example" title="tax product"  name='tax'>
            <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>

       
         <div class="mb-3">
          <label for="unit_price" class="form-label " style='font-size:0.8rem'>Unit price</label>
        <input value="{{ old('unit_price') ?? '' }}" name='unit_price' type="text" class="form-control  form-control-sm" placeholder="unit price" title='unit price'>  
       </div>

    </div>
    
      <div class=' col category subcategory'> 
      <label for="category" class="form-label " style='font-size:0.8rem'>Category</label>
        <select class="form-select form-select-sm  mb-2 " aria-label=".form-select-sm example"  title='Category' name='category'>
            <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
       
        <label for="subcategory" class="form-label " style='font-size:0.8rem'>Subcategory</label>
        <select class="form-select form-select-sm mb-2" aria-label=".form-select-sm example" title='Subcategory' name='subcategory'>
            <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>

           <div class="mb-3">
         <label for="selling_price" class="form-label " style='font-size:0.8rem'>Selling price</label>
           <input  value="{{ old('selling_price') ?? '' }}" name='selling_price' type="text" class="form-control  form-control-sm"  title="selling price" >
         </div>
      </div> 

      <div class=' col seller fee'>

           <label for="seller" class="form-label " style='font-size:0.8rem'>Seller shop</label>
       <select class="form-select form-select-sm mb-2" aria-label=".form-select-sm example" title='seller shop ' name='seller'>
          <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>

        <label for="fee" class="form-label " style='font-size:0.8rem'>Seller fee</label>
        <select class="form-select form-select-sm mb-2" aria-label=".form-select-sm example"  title="seller fee"  name='fee'>
            <option value="1" {{ old('fee')== 'value' ? 'selected': '' }}>One</option>
            <option value="2" selected>Two</option>
            <option value="3">Three</option>
          </select>

          <div class="mb-3 d-flex justify-content-between">

          <div class="">
           <label for="euro_coef" class="form-label " style='font-size:0.8rem'>Euro coefficient</label>
            <input   value="{{ old('euro_coef') ? old('euro_coef') : '0.8832371' }}" name='euro_coef' type="text" class="form-control  form-control-sm" title="value of 1 dollar in euro"  >
          </div>

          <div class="">
            <label for="discount" class="form-label " style='font-size:0.8rem'>Discount</label>
             <input   value="{{ old('discount') ?? '' }}" name='discount' type="text" class="form-control  form-control-sm"  title="discount amount"  >
          </div>

        </div>
      </div> 

       
  </div>

  <div class=' row  my-2'> 

    <div class=' col '> 
       <div class="mb-3">
        <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Nom du produit 🇨🇵</label>
        <input  value="{{ old('fr_product_name') ?? '' }}" name='fr_product_name'  type="text" class="form-control form-control-sm" 
         title='nom du produit 🇨🇵 '>
       </div>
      <div class="mb-3">
         <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Description en francais 🇨🇵</label>
        <textarea  value="{{ old('fr_description') ?? '' }}" name='fr_description' class="form-control" rows="3"  title='description en francais 🇨🇵'></textarea>
      </div>
    </div> 

    <div class=' col'> 
        <div class="mb-3">
        <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Product name 🇬🇧</label>
        <input  value="{{ old('en_product_name') ?? '' }}" name='en_product_name'  type="text" class="form-control  form-control-sm" id="exampleFormControlInput1" title='product name  🇬🇧'>
       </div>
      <div class="mb-3">
         <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Description in english 🇬🇧</label>
        <textarea  value="{{ old('en_description') ?? '' }}" name='en_description' class="form-control"  rows="3"  title='description in english 🇬🇧'></textarea>
      </div>
    </div> 

    <div class=' col'> 
        <div class="mb-3">
        <label for="formFileSm" class="form-label d-block" dir='rtl'  style='font-size:0.8rem'>🇦🇪 اسم المنتج </label>
        <input type="text" class="form-control  form-control-sm" dir='rtl' id="exampleFormControlInput1"   title='🇦🇪 اسم المنتج '>
       </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label d-block" dir='rtl'  style='font-size:0.8rem'>🇦🇪 وصف المنتج</label>
          <textarea value="{{ old('ar_description') ?? '' }}" name='ar_description' class="form-control" dir='rtl' rows="3" title='🇦🇪 وصف المنتج'></textarea>
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
       <div class="mb-3">
        <label for="formFileSm" class="form-label " style='font-size:0.8rem'>Csv file</label>
        <input class="form-control form-control-sm" id="formFileSm" type="file">
      </div>
    </div> 
     <div class=' col p-3'> 
       <div class="d-grid gap-2 mt-3 pt-1">
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