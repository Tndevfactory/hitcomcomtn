@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'Accueil')


@section('css')
<style>
.checked {
  color: orange;
}

.card-categorie{
    box-shadow: 1px 1px 8px rgba(0,0,0,0.4);
    transition: .15s ease-in-out;

    transform:scale(1,1)
}
.card-categorie:hover{
    transform:scale(1.001,1.001);
    box-shadow: 1px 1px 18px rgba(0,0,0,0.5);
}
.card{
    position:relative;

}

.control-btn{
    position:absolute;
    width:100%;
    height:100%;
    padding:.7rem;
    display:flex;
    justify-content:center;
    align-items:center;
    inset:0;
    background-color:rgba(0,0,0,0.6);
    opacity:0;
    transition: .3s ease-in-out;
}
.control-btn > a span{
    color:white !important;
    transform:scale(1,1);
    transition: .3s ease-in-out;
}
.control-btn > a span:hover{
    color:wheat !important;
    transform:scale(1.25,1.25)
}
.card:hover .control-btn{
    opacity:1;
    
}

.card-body h5{
 color:#444;
}
.card-body p{
 color:#666;
 font-size:.9rem;
}
.price{
    color:#444;
    display:flex;
    justify-content:space-between;
    font-size:.9rem;
}
</style>
@endsection


@section('content')



@php
    $isActive = false;
    $hasError = true;
@endphp



<div class='container'>

<div id="carouselExampleCaptions" class="carousel slide mt-4" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/1200/401"" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/1200/400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/1200/401"" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

<h2 class='text-center mt-5'> categories </h2>

<div class='container'>



<div class="row row-cols-1 row-cols-md-4 g-4">

    @for ($i = 0 ; $i < 6 ; $i++)
        <div class="col">
           <div class="card card-categorie bg-dark text-white border border-0 h-100">
                <img src="https://picsum.photos/400/200" class="card-img" alt="...">
                <div class="card-img-overlay ">
                    
                    <div style='background-color:rgba(0,0,0,0.7)' class="w-100">
                    <p class="card-title fs-6 text-center py-1"
                     style='font-weight:700;text-shadow: 1px 1px 3px rgba(0,0,0,0.5)'> Table de cuisine </p>
                     </div>
                    <a href="#" class="stretched-link btn-sm">                
                    </a>

                </div>
            </div>
        </div>
    @endfor
    
</div>

</div>

<h2 class='text-center mt-5'> Produits </h2>

<div class='container'>

<div class="row row-cols-1 row-cols-md-4 g-4">


    @for ($i = 0; $i < 10; $i++)
    <div class="col">
        <div class="card h-100 shadow-sm">
        <img src="https://picsum.photos/500/300" class="card-img-top" alt="...">
        <div class='control-btn'>
        
            <a href='#' title='details'> <span class="fas fa-eye text-light"></span> </a>
                <a href='#' title='wish list'> <span class="fas fa-heart text-light mx-4"></span></a>
                <a href='#'  title='add to cart'> <span class="fas fa-cart-plus text-light "></span></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Hachoir-mx7</h5>
            <span>
                <span class="fa fa-star checked fs-6"></span>
                <span class="fa fa-star checked  fs-6"></span>
                <span class="fa fa-star checked  fs-6"></span>
                <span class="fa fa-star  fs-6"></span>
                <span class="fa fa-star  fs-6"></span> 
            <span>
            <a href='#'class="text-decoration-none link-secondary fs-6"> (12)</a>
            <p class="card-text">This is a longer card with supporting text below as a natural</p>
            <div class='price'>
            <span class="card-text">Price: 150$</span>
            <span class="card-text">Remise: -35%</span>
            </div>
            
        </div>
        </div>
    </div> 
    @endfor
  
</div>

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