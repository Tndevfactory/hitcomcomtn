
<style>
        .entete{
          height:8vh;
          background: rgb(0,212,255);
background: linear-gradient(198deg, rgba(0,212,255,1) 0%, rgba(53,143,209,1) 23%, rgba(65,139,210,1) 71%, rgba(0,212,255,1) 100%);
        }

        .cart-counter{
          top:-5px ; 
          left:100%!important; 
          font-size:0.7rem;
         
        }
        
        .currency{
          inset: -10px auto auto -1px!important;
        z-index: 9999!important;
        min-width: 3rem;
        }

        .language{
            inset: -10px auto auto -1px!important;
            z-index: 9999!important;
            min-width: 3rem;
        }
                      
        

         @media only screen and (max-width:700px){
              
              .cart-counter{
                margin-top:6px;
              left:10%!important;   
            
                }
              
          }

</style>

<div class=' entete bg-info d-flex align-items-center justify-content-between'> 
    <div class='container-fluid d-flex align-items-center justify-content-between'>
        <p> Devenir vendeur avec nous </p>
        <div class='d-flex z-index-9'>  
        
        <ul class="navbar-nav mb-2 mb-lg-0 me-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white fs-5 font-weight-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             &euro;
            </a>
            <ul class="dropdown-menu currency" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">&euro;</a></li>
              <li><a class="dropdown-item" href="#">&dollar;</a></li>
            </ul>

          </li>
       </ul> 
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            🇨🇵
          </a>
          <ul class="dropdown-menu language" aria-labelledby="navbarDropdown">
            <li class='language-item'><a class="dropdown-item" href="#">🇨🇵</a></li>
            <li class='language-item'><a class="dropdown-item" href="#">🇬🇧</a></li>
            <li class='language-item'><a class="dropdown-item" href="#">🇦🇪</a></li>
          </ul>
        </li>
      </ul> 
      </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand text-uppercase" href="#">
    <i class="fas fa-dolly"></i>
    hitcom
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Table de cuisine
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tapis
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Porcelaine
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Alimentation
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
      </ul>

      <form class="d-flex">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
      <div class='mx-2 my-2 my-md-0 '>
          <a href='#' class='text-secondary' title='wish list'>
            <i class="fas fa-heart"></i>
          </a>
      </div>
      <div class='mx-2 my-2 my-md-0  position-relative'>
          <a href='#' class='text-secondary' title='cart list'>
              <span class="position-absolute cart-counter start-100 translate-middle 
              badge rounded-pill bg-danger" >
                99
              </span>
              <i class="fas fa-shopping-cart"></i>
          </a>
      </div>
      

      <div class='mx-2 my-2 my-md-0 '>
         
          <ul class="navbar-nav mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" title='connexion' id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="fas fa-user-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Connexion</a></li>
            <li><a class="dropdown-item" href="#">Inscription</a></li>
            
          </ul>
        </li>
      </ul> 
      </div>
    </div>
  </div>
</nav>