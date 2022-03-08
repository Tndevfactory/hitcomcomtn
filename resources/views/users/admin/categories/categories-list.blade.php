@extends('admin')

@section('title', 'categories-list')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('manage categories') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-between mt-3 px-3'> 
    <form class="d-flex">
        <input class="form-control me-2" style='width:16rem' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    <a href="{{ route('admin-category-add', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-plus"></i> {{ __('add category') }} </a> 
</div>
<div class='d-flex justify-content-end mt-3 pe-3'> 
    <table class="table">
        <thead class='table-secondary'>
            <tr>
            <form action="#" method="GET">
            <th scope="col">#</th>
            <th scope="col" >name</th>
            <th scope="col">
            <select class='select text-capitalize' name="price" id="price" onchange="this.form.submit()"  style="width:100px;"> 
                     <option value='0' class='text-capitalize' >price</option>
                     <option value='1' >300</option>
                     <option value='2' >400</option>
                     
            </select>
            </th>
            <th scope="col">
             <select  class='select  text-capitalize' name="category" id="category" onchange="this.form.submit()" style="width:180px;"> 
                     <option value='0' class='text-capitalize' >categories </option>
                     <option value='1' >300</option>
                     <option value='2' >400</option>
                     
            </select>
            </th>
            <th scope="col" >
            <select  class='select  text-capitalize'  name="subcategory" id="subcategory" onchange="this.form.submit()" style="width:180px;"> 
                     <option value='0'  class='text-capitalize'>subcategory </option>
                     <option value='1' >300</option>
                     <option value='2' >400</option>
                     
            </select>
            </th>
            <th scope="col" class='text-capitalize'>view</th>
            <th scope="col" class='text-capitalize'>edit</th>
            <th scope="col" class='text-capitalize'>delete</th>
            </form>
            </tr>
            
        </thead>
        <tbody>

            @for ($i=1; $i < 5; $i++)

                <tr>

                <td>
                 <img src={{asset(Auth::user()->user_image )}} title="{{Auth::user()->first_name}} " 
                     height=43 width=43 class='rounded-circle mb-1 d-inline-block' alt='user'>
                </td>
                <td>margoum black 11X13</td>
                <td>$66.500</td>
                <td>Tapis</td>
                <td>margoum</td>
                <td><a href='#'><i class="fa-solid fa-eye text-info"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            
                </tr>
                
            @endfor

        </tbody>
     </table>
</div>

<nav class='mt-4' aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

@endsection


@section('js')
<script>

</script>
@endsection