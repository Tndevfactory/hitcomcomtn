@extends('admin')

@section('title', 'stock-list')


@section('content')

@php
$can = session()->get('can');
@endphp

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('manage stock') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-between mt-3 px-3'> 
    <form class="d-flex">
        <input class="form-control me-2" style='width:16rem' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    <a href="{{ route('admin-stock-add', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-plus"></i> {{ __('add stock') }} </a> 
</div>
<div class='d-flex justify-content-end mt-3 pe-3'> 
    <table class="table">
        <thead class='table-secondary'>
            <tr>
            <form action="#" method="GET">
            <th scope="col">id</th>
           
            <th scope="col">
            <select class='select text-capitalize' name="price" id="price" onchange="this.form.submit()"  style="width:150px;" > 
                     <option value='0' class='text-capitalize' >stock name</option>
                     <option value='1' >300</option>
                     <option value='2' >400</option>
                     
            </select>
            </th>
            <th>
            <select class='select text-capitalize' name="price" id="price" onchange="this.form.submit()"  style="width:150px;" > 
                     <option value='0' class='text-capitalize' >stock slug</option>
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

@if($can['list-product'])

            @for ($i=1; $i < 4; $i++)

                <tr>

                <td> {{ $i }} </td>
                <td>stock-name-uuu</td>
                <td>stock-slug-uuu</td>
                
                <td><a href='#'><i class="fa-solid fa-eye text-info"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            
                </tr>
                
            @endfor
  @endif

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