@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'wishlist')


@section('css')
<style>

</style>
@endsection


@section('content')

<div class='container my-3'>
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-capitalize"><a class='text-decoration-none' href="{{ route('home', App::getLocale())}}">{{ __('home') }}</a></li>
                <li class="breadcrumb-item  active text-capitalize">{{ __('wishlist') }}</li>
            </ol>
    </nav>
    <div class='row row-cols-1 row-cols-md-2 product-details'>

        <div class='col d-flex justify-content-center'>
        <img src="https://picsum.photos/500/300" class="img-fluid" alt="...">
        </div>

        <div class='col'>
            <ul class="list-group">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item">And a fifth one</li>
            <li class="list-group-item">
            <button class='btn btn-primary btn-sm'>back to store</button>
            <button class='btn btn-success btn-sm'>add to cart</button>
            <button class='btn btn-warning btn-sm'>rate products</button>
            
            </li>
            </ul>
        </div>

    </div>

    <div class=' product-comments'>

            
        @for ($i =0 ; $i < 6; $i++)
            
        <div class="card mb-3 h-100 my-3  p-2" >
            <div class="row g-0">
                <div class="col-12 d-flex justify-content-start align-items-center">
                <img src="https://picsum.photos/400/200" style='width:35px;height:35px' class="rounded-circle" alt="...">
                 <span class="fs-6 ms-1">Mohamed Belgacem</span>
                 <span class="fs-6 ms-1"> 5/10/2021 </span>
                        <span class="fs-6 ms-1">
                            <span class="fa fa-star checked fs-6"></span>
                            <span class="fa fa-star checked  fs-6"></span>
                            <span class="fa fa-star checked  fs-6"></span>
                            <span class="fa fa-star  fs-6"></span>
                            <span class="fa fa-star  fs-6"></span> 
                        <span>
                </div>
                <div class="col-12">
                    <div class="card-body">
                        
                        <p class="card-text fs-6 text-secondary ms-4"> best This is a wider card with
                        supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.</p>
                        
                    
                    </div>
                </div>
            
            </div>
        </div>
        @endfor


        <nav class='mt-4 comments-pagination' aria-label="Page navigation example">
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


</div>
@endsection


@section('js')
<script>

</script>
@endsection