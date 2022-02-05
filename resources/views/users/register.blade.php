@extends('base')

@section('meta')
 <meta name="author" content="ch">
@endsection

@section('title', 'login')


@section('css')
<style>
.t{
    color:red;
}
</style>
@endsection


@section('content')

<div class='container  my-5 '>

<div class='row'>
    <div class='col col-md-4 offset-md-4 '>
        
        <form class="row g-3 p-0 p-md-2 bg-light rounded shadow-sm">
            <span class="fs-5 text-center d-block"> 
                <i class="fas fa-lock fs-4 d-inline-block text-dark "></i>
            Sign up </span>
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>

        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        
        <div class="col-12 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Sign up</button>
            <a href='#' class='text-decoration-none link-primary'> Have an account, please sign in</a>
        </div>
        </form>
    </div>

</div>


</div>
@endsection


@section('js')
<script>

</script>
@endsection