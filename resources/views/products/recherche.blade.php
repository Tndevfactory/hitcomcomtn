@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'recherche')


@section('css')
<style>

</style>
@endsection


@section('content')

<div class='container  my-3'>
@for ($i =0 ; $i < 6; $i++)
    
<div class="card mb-3 h-100 my-3" >
  <div class="row g-0">
    <div class="col-md-2">
      <img src="https://picsum.photos/400/200" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title fs-5 ">hachoir gsx-890</h5>
        <p class="card-text fs-6 text-secondary"> best This is a wider card with
         supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
        
      <a href='#' class='stretched-link'> </a>
      </div>
    </div>
   
  </div>
</div>
@endfor



<nav class='mt-4 product-pagination' aria-label="Page navigation example">
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

</div>
@endsection


@section('js')
<script>

</script>
@endsection